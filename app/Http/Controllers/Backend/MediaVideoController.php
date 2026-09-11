<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MediaVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MediaVideoController extends Controller
{
    public function MediaVideoList()
    {
        $title = 'Media Video List';

        $media_videos = MediaVideo::orderBy('id', 'desc')->get();

        return view('backend.media_video.list', compact('title', 'media_videos'));
    } // End Method

    public function MediaVideoAdd()
    {
        $title = 'Media Video Add';

        return view('backend.media_video.add', compact('title'));
    } // End Method

    public function MediaVideoStore(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:150',
                'youtube_url' => 'required|url',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'youtube_url.required' => 'YouTube URL is required',
                'youtube_url.url' => 'Enter a valid URL',
            ],
        );

        try {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $youtube_id = MediaVideo::extractYoutubeId($request->youtube_url);

            if (!$youtube_id) {
                return redirect()->back()->with('error', 'Could not detect a valid YouTube video ID from that URL.')->withInput();
            }

            $data = new MediaVideo();
            $data->title = $request->title;
            $data->youtube_url = $request->youtube_url;
            $data->youtube_id = $youtube_id;
            $data->views = 0; // starts at 0, increments automatically as it's played
            $data->published_at = now(); // upload time, used for "X ago" display
            $data->status = 'active';
            $data->save();

            DB::commit();

            return redirect()->route('admin.media_video.list')->with('success', 'Media Video Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating media video: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method

    public function MediaVideoEdit($id)
    {
        $title = 'Media Video Edit';

        $media_video = MediaVideo::findOrFail($id);

        return view('backend.media_video.edit', compact('title', 'media_video'));
    } // End Method

    public function MediaVideoUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'title' => 'required|max:150',
                'youtube_url' => 'required|url',
                'status' => 'required',
            ],
            [
                'id.required' => 'ID is required',
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'youtube_url.required' => 'YouTube URL is required',
                'youtube_url.url' => 'Enter a valid URL',
                'status.required' => 'Status is required',
            ],
        );

        try {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = MediaVideo::findOrFail($request->id);

            $youtube_id = MediaVideo::extractYoutubeId($request->youtube_url);

            if (!$youtube_id) {
                return redirect()->back()->with('error', 'Could not detect a valid YouTube video ID from that URL.')->withInput();
            }

            $data->title = $request->title;
            $data->youtube_url = $request->youtube_url;
            $data->youtube_id = $youtube_id;
            // views & published_at stay as-is — views auto-counts, published_at is fixed at upload time
            $data->status = $request->status;
            $data->save();

            DB::commit();

            return redirect()->route('admin.media_video.list')->with('success', 'Media Video Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating media video: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method

    public function MediaVideoDelete($id)
    {
        DB::beginTransaction();

        try {
            $data = MediaVideo::findOrFail($id);
            $data->delete();

            DB::commit();

            return redirect()->route('admin.media_video.list')->with('success', 'Media Video Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting media video: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
