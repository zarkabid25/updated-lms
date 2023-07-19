<?php

namespace App\Http\Controllers\TeachersPanel;

use App\Http\Controllers\Controller;
use App\Models\CourseLecture;
use App\Models\CreateClass;
use App\Models\CreateCourse;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Spatie\Permission\Models\Permission;

use function GuzzleHttp\Promise\all;

class CreateCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $this->validate($request, [
//            'class_name' => 'required',
            'course_price' => 'required|numeric',
            'course_name' => 'required|string|max:30',
            'course_video_title' => 'required|string',
            'course_video_link' => 'required|string',
        ]);

        try{
            $data = [
//                'create_class_id' => $request->class_name,
                'teacher_id' => auth()->user()->id,
                'price' => $request->course_price,
                'course_name' => $request->course_name,
                'video_title' => $request->course_video_title,
                'video_link' => $request->course_video_link
            ];
            if(empty($request->course_date) && empty($request->course_time)){
                $data['course_date'] = date('Y-m-d');
                $data['course_time'] = date('H:i:s');
            }else{
                $data['course_date'] = $request->course_date;
                $data['course_time'] = $request->course_time;
            }

            if($request->has('course_cover') && !empty($request->course_cover)){
                $data['course_image'] = compressImagePHP( $request, 'course_cover' );
            }
            if(!empty($request->description_course)){
                $data['course_description'] = $request->description_course;
            }
            if($request->has('video_thumnail') && !empty($request->video_thumnail)){
                $data['video_thumbnail'] = compressImagePHP( $request, 'video_thumnail' );
            }

//            if(\Session::has('names')){
//                foreach(\Session::get('names') as $name){
//                    $vid[] = $name;
//                }
//                \Session::forget('names');
                //$vid[] = $this->uploadVid($request, 'vid_1', $request->course_name);
//            }

//            if($request->has('vid_2') && !empty($request->vid_2)){
//                $vid[] = $this->uploadVid($request, 'vid_2', $request->course_name);
//            }
//            if($request->has('vid_3') && !empty($request->vid_3)){
//                $vid[] = $this->uploadVid($request, 'vid_3', $request->course_name);
//            }
//            if($request->has('vid_4') && !empty($request->vid_4)){
//                $vid[] = $this->uploadVid($request, 'vid_4', $request->course_name);
//            }

            $res = (new CreateCourse())->createCourse($data);

//            if(!empty($vid)){
//                $sub_type = (new Subscription())->subType();
//                $remaining_vid = (new User())->checkVids();
//                $remaining_vids = $remaining_vid->remaining_vids;
//
//                $count = count($vid);
//                $vids_left = $remaining_vids - $count;
//
//                if($sub_type->subscription_type == 'trial' && $vids_left > 0){
//                    $resul = (new CourseLecture())->storeLectures($res->id, $vid);
//                    if(!empty($resul)){
//                        $result = (new User())->updateRemainingVids($vids_left);
//                    }
//                }elseif($sub_type->subscription_type == 'basic' && $vids_left > 0){
//                    $resul = (new CourseLecture())->storeLectures($res->id, $vid);
//                    if(!empty($resul)){
//                        $result = (new User())->updateRemainingVids($vids_left);
//                    }
//                }elseif ($sub_type->subscription_type == 'enterprise'){
//                    $result = (new CourseLecture())->storeLectures($res->id, $vid);
//                }else{
//                    return redirect()->back()->with('error', 'You have remaining ' .$remaining_vid. 'videos which are less then your selected videos.');
//                }
//            }

            if(!empty($res)){
                Permission::create(['name' => 'Course'.$res->id,'guard_name' => 'web']);
                return redirect()->route('teacher.my-courses')->with('success', 'Course created successfully.');
            }else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }

        } catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $course_id = decrypt($id);

        $res = (new CreateCourse())->getSingleCourse($course_id);

        $vid = (new CourseLecture())->getVids($course_id);

        $classes = (new CreateClass())->getAllClasses();

        if(!empty($res)){
            $data = [
                'cour' => $res,
                'videos' => $vid,
                'classes' => $classes
            ];

            return view('teacher.edit-course', $data);
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_price' => 'required|numeric',
            'course_name' => 'required|string|max:30',
            'course_video_title' => 'required|string',
            'course_video_link' => 'required|string',
        ]);

        try{
            $course_id = decrypt($id);

            $data = [
                'teacher_id' => auth()->user()->id,
                'price' => $request->course_price,
                'course_name' => $request->course_name,
                'video_title' => $request->course_video_title,
                'video_link' => $request->course_video_link
            ];

            if($request->has('course_cover') && !empty($request->course_cover)){
                $data['course_image'] = compressImagePHP( $request, 'course_cover' );
            }

            if($request->has('video_thumnail') && !empty($request->video_thumnail)){
                $data['video_thumbnail'] = compressImagePHP( $request, 'video_thumnail' );
            }

            if(!empty($request->description_course)){
                $data['course_description'] = $request->description_course;
            }

            $res = (new CreateCourse())->updateCourse($data, $course_id);

            if(!empty($res)){
                return redirect()->route('teacher.my-courses')->with('success', 'Course updated successfully.');
            } else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }

        } catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function courseVideo(Request $request){
        try{
//            if($request->file('file') && !empty($request->file)){
//                $vid = $this->uploadVid($request, 'file', $request->course_name);
//            }
            if(\Session::has('names')){
                foreach(\Session::get('names') as $name){
                    $vid = $name;
                }
                \Session::forget('names');
                //$vid[] = $this->uploadVid($request, 'vid_1', $request->course_name);
            }

            $data = [
                'course_id' => $request->course_id,
                'class_title' => $request->class_title,
                'course_type' => $request->course_type,
                'course_doc' => $vid
            ];

            $result = (new CourseLecture())->storeSingleLectures($data);

            if(!empty($result)){
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function updateLecture(Request $request){
        try{

//            if($request->has('course_vid') && !empty($request->course_vid)){
//                $vid = $this->uploadVid($request, 'course_vid', $request->course_name);
//            }
            if(\Session::has('names')){
                foreach(\Session::get('names') as $name){
                    $vid = $name;
                }
                \Session::forget('names');
                //$vid[] = $this->uploadVid($request, 'vid_1', $request->course_name);
            }

            $data = [
                'class_title' => $request->class_title,
                'course_doc' => $vid
            ];

            $result = (new CourseLecture())->updateSingleLectures($data, $request->course_id);
            if(!empty($result)){
                return redirect()->back()->with('success', 'Record updated successfully.');
            }else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function deleteCourse(Request $request){
        $course_id = $request->user_id;
        $res = (new CreateCourse())->deleteCourse($course_id);

        if($res == '1'){
            $p = Permission::where('name','Course'.$course_id)->first();
            if($p)
            {
                $p->delete();
            }
            return response()->json(['success'=>'Course deleted successfully!']);
        }else{
            return response()->json(['error', 'Something went wrong.']);
        }
    }

    public function deleteLecture(Request $request){
        $lec_id = $request->lec_id;
        $res = (new CourseLecture())->delLecture($lec_id);

        if($res == '1'){

            return response()->json(['success'=>'Lecture deleted successfully!']);
        }else{
            return response()->json(['error', 'Something went wrong.']);
        }
    }

    public function uploadVid($request, $key, $course_name){
        if(is_array($request) ){
            $file = $request[ $key ];
        } else {
            $file = $request->file( $key );
        }

//        $filename = $file->getClientOriginalName();
//        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $filename = $file->hashName();

        $path = public_path( 'videos/'. auth()->user()->id) . DIRECTORY_SEPARATOR;
        $file->move($path, $filename);
        return $filename;
    }

    public function uploadTeachVids(Request $request){

        if($request->hasFile('file') ){
            $file = $request;
        }
        $file = $request->file('file');
//        $filename = $file->getClientOriginalName();
//        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $filename = $file->hashName();
       // dd($filename);
        $path = public_path( 'videos/'. auth()->user()->id) . DIRECTORY_SEPARATOR;

        $file->move($path, $filename);

        if(\Session::has('names')){
            \Session::push('names', $filename);

        }else{
            \Session::put('names', [$filename]);
        }

        return $filename;
    }

    public function compressImagePHP( $request, $key ) : string
    {
        if(is_array($request) ){
            $image = $request[ $key ];

        } else {
            $image = $request->file( $key );
        }

        $imageHashedName = $image->hashName();

        $imgExplodedName = explode( ".", $imageHashedName );

        $publicPath = public_path( 'images' ) . DIRECTORY_SEPARATOR;

        $img = Image::make( $image )->save( $publicPath . $imgExplodedName[ 0 ] . '.' . $imgExplodedName[ 1 ] );

        $img->backup();

        $img->resize( 200, null, function( $constraint ) {
            $constraint->aspectRatio();
            $constraint->upsize();
        } )->save( $publicPath . $imgExplodedName[ 0 ] . '-thumbs200.' . $imgExplodedName[ 1 ] );
        $img->reset();

        $img->destroy();

        return $imgExplodedName[ 0 ] . '.' . $imgExplodedName[ 1 ];
    }
}
