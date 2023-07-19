<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\{
    Admin\AdminController,
    LogoutController,
    StudentDashboardController,
    TeacherDashboardController,
    ImageController,
    MainBlogController,
    ContactController
};

use App\Http\Controllers\Admin\{
    TeacherController,
    StudentController,
    SubscriptionController,
    AdminContactController
};
use App\Http\Controllers\TeachersPanel\{
    CreateClassController,
    CreateCourseController,
    MyProfileController,
    BlogController,
    ZipController,
    History,
    Withdraw
};

use App\Http\Controllers\FrontController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\WebrtcStreamingController;





use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/testingg', function (){
   dd(date('h:i:s'));
});

Route::get('/cls', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    $run = Artisan::call('view:clear');

    Session::flush();
    return 'FINISHED';
});

Route::get('/home-page', function () {
    return view('home.index');
});


Route::get('/images/{path}/{ext}', [ImageController::class, 'index'])
    ->name('imagepath');

Route::get('/test', function () {
    return view('home2');
});

Route::get('/testing', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('user-login');

Route::get('/forgot/password', function () {
    return view('auth.passwords.email');
})->name('forgot-password');


Route::get('/zoom', function () {
    return view('zoom');
})->name('zoom');

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('register/here', function () {
    return view('auth.register');
})->name('user-reg');
// user routes
Route::get('/price', function () {
    return view('user.price');
});

Route::get('/my/blogs', [BlogController::class, 'Blogs'])
    ->name('my-blogs');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check_admin'], 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/myprofile', [AdminController::class, 'myProfile'])->name('my-profile');
    Route::post('/profile/update', [AdminController::class, 'profileUpdate'])
        ->name('update-profile');
    //Courses routes
    Route::get('/all_courses', [\App\Http\Controllers\Admin\CourseController::class, 'index'])->name('all-courses');
    Route::get('/course/delete/{id}', [\App\Http\Controllers\Admin\CourseController::class, 'destroy'])
        ->name('courseDelete');
    Route::post('/course/status', [\App\Http\Controllers\Admin\CourseController::class, 'update'])
    ->name('courseEdit');

    //Classes routes
    Route::get('/course/students/{id}', [\App\Http\Controllers\Admin\ClassController::class, 'show'])->name('class.students');

    Route::post('/class/status', [\App\Http\Controllers\Admin\ClassController::class, 'update'])
    ->name('classEdit');

    //MCQ's routes
    Route::get('/all_categories', [\App\Http\Controllers\Admin\McqsController::class, 'allCategories'])->name('all-cats');
    Route::get('/categories_mcqs/{id}', [\App\Http\Controllers\Admin\McqsController::class, 'index'])->name('cats-ques');
    Route::get('/categories_mcqs/edit/{id}', [\App\Http\Controllers\Admin\McqsController::class, 'editQuizQues'])->name('edit-ques');
    Route::post('/categories_mcqs/update/{id}', [\App\Http\Controllers\Admin\McqsController::class, 'updateQuizQues'])->name('update-mcqs');
    //    Route::get('/edit_categories', function (){
    //       return view("admin.mcq's.edit-categories");
    //    })->name('edit-categories');
    Route::get('/edit_category/{id}', [\App\Http\Controllers\Admin\McqsController::class, 'editCategory'])->name('edit-cat');
    Route::post('/update_category', [\App\Http\Controllers\Admin\McqsController::class, 'updateCategory'])->name('update-cat');
    Route::get('/create/mcq-category', function () {
        return view("admin.mcq's.mcq's-category");
    })->name('create-mcq');
    Route::post('store/category', [\App\Http\Controllers\Admin\McqsController::class, 'store'])->name('store-category');
    Route::get('/create/mcqs/{s}', function ($s) {
        return view("admin.mcq's.create-mcqs",compact('s'));
    })->name('create-mcqs');
    Route::post('/post/mcqs', [\App\Http\Controllers\Admin\McqsController::class, 'createMcqs'])->name('post-mcqs');
    Route::post('fetch/mcqs_categories', [\App\Http\Controllers\Admin\McqsController::class, 'getCategoryData'])->name('get_data-categories');
    Route::get('mcqs/edit', function () {
        return view("admin.mcq's.edit-mcqs");
    })->name('mcqs-edit');
    Route::get('/edit_quiz_ques', [\App\Http\Controllers\Admin\McqsController::class, 'editQuizQues']);
    Route::get('/update_quiz_ques', [\App\Http\Controllers\Admin\McqsController::class, 'updateQuizQues']);
    Route::get('/create/test_ques_uni', [\App\Http\Controllers\Admin\McqsController::class, 'testUni'])->name('test-uni');
    Route::post('/store/test_ques_uni', [\App\Http\Controllers\Admin\McqsController::class, 'storeTestUni'])->name('store-test-uni');
    Route::get('/all_testTypes', [\App\Http\Controllers\Admin\McqsController::class, 'allTestType'])->name('all-testTypes');
    Route::get('edit/test_ques_uni/{id}/{uni_id}', [\App\Http\Controllers\Admin\McqsController::class, 'editTestUni'])->name('edit-testTypes');
    Route::post('update/test_ques_uni', [\App\Http\Controllers\Admin\McqsController::class, 'updateTestUni'])->name('update-testTypes');
    Route::get('/get_uni', [\App\Http\Controllers\Admin\McqsController::class, 'getUni'])->name('get-uni');
    //End MCQ's routes

    Route::resources([
        'teacher' => TeacherController::class
    ], [
        'except' => ['destroy']

    ]);
    Route::post('/update/teacher', [TeacherController::class, 'updateTeacher'])
        ->name('updateTeacher');
    Route::get('/tech/delete/{id}', [TeacherController::class, 'delete'])
        ->name('teacher-delete');

    Route::resources([
        'student' => StudentController::class
    ], [
        'except' => ['destroy']

    ]);
    Route::post('/update/student', [StudentController::class, 'updateStudent'])
        ->name('updateStudent');
    Route::get('/std/delete/{id}', [StudentController::class, 'delete'])
        ->name('studentDelete');

    Route::get('/subscription', [SubscriptionController::class, 'index'])
        ->name('subscriptions');
    Route::post('/update/subscription', [SubscriptionController::class, 'updateSubscription'])
        ->name('updateSubscription');
    Route::get('/delete/{id}', [SubscriptionController::class, 'delete'])
        ->name('subscription-delete');

    Route::get('/contact', [AdminContactController::class, 'index'])
        ->name('contact');
    Route::get('/view/request/{id}', [AdminContactController::class, 'singleRequest'])
        ->name('view-request');
    Route::get('/delete/request/{id}', [AdminContactController::class, 'deleteSingleRequest'])
        ->name('delete-request');
    Route::get('/withdraw/requests', [AdminController::class, 'withdrawRequests'])
        ->name('withdraw-requests');
    Route::get('/request/status/{status}/{id}', [AdminController::class, 'withdrawRequestStatus'])
        ->name('request-status');
    Route::post('/payment/withdraw', [AdminController::class, 'paymentWithdraw'])
        ->name('payment-withdraw');
    Route::get('/payment_requests', [PaymentController::class, 'paymentRequests'])->name('payment-requests');
    Route::get('/request_detail/{id}', [PaymentController::class, 'requestDetail'])->name('request-detail');
    Route::get('/update/request_status/{id}/{request_product}', [PaymentController::class, 'updateUequestStatus'])->name('update-request-status');
});

Route::get('/chat', [ChatController::class, 'chat'])->name('chat')
    ->middleware('auth');
Route::post('/chat/store', [ChatController::class, 'storeChat'])
    ->name('store-chats')
    ->middleware('auth');

Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'verified', 'check_teacher'], 'as' => 'teacher.'], function () {

    Route::get('dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
    Route::get('/my/profile', [TeacherDashboardController::class, 'myProfile'])->name('myProfile');
    Route::get('/course/create', [TeacherDashboardController::class, 'createCourse'])->name('create-course');
    Route::get('/courses', [TeacherDashboardController::class, 'myCourse'])->name('my-courses');
    Route::get('/all-courses', [TeacherDashboardController::class, 'allCourse'])->name('all-courses');
    Route::get('/join-courses/{id}', [TeacherDashboardController::class, 'joinCourse'])->name('join-courses');
    Route::get('/my-students', [TeacherDashboardController::class, 'myStudents'])->name('my-students');
    Route::get('/pricing/menu', [TeacherDashboardController::class, 'priceMenu'])->name('price-menu');
    Route::get('/trial/menu/{type}', [TeacherDashboardController::class, 'trialMenu'])->name('trial-menu');
    Route::get('/payment/type/{type}', [TeacherDashboardController::class, 'paymentType'])->name('payment-type');
    Route::post('/payment/submission', [TeacherDashboardController::class, 'paymentSubmission'])->name('payment-submission');
    Route::get('/course/detail/{id}', [TeacherDashboardController::class, 'courseDetail'])->name('course-detail');
    Route::get('/notes', [TeacherDashboardController::class, 'notes'])->name('t-notes');
    Route::get('/notes/create', [TeacherDashboardController::class, 'createNotes'])->name('create-notes');
    Route::post('/add_note', [TeacherDashboardController::class, 'storeNotes'])->name('store-notes');
    Route::get('/delete_note/{id}', [TeacherDashboardController::class, 'deleteNotes'])->name('delete-notes');
    Route::get('/edit_note/{id}', [TeacherDashboardController::class, 'editNotes']);
    Route::post('/update/note/{id}', [TeacherDashboardController::class, 'updateNotes'])->name('update-note');
    Route::get('/create/notes', [TeacherDashboardController::class, 'createNotes'])->name('create-notes');
    Route::get('/create/blog', [TeacherDashboardController::class, 'createBlog'])->name('create-blog');
    Route::get('/create/class', [TeacherDashboardController::class, 'createClass'])->name('create-class')->middleware('check_subscription');
    Route::get('/upload/profile', [TeacherDashboardController::class, 'uploadProfile'])->name('upload-profile');

    Route::post('/profile/update', [MyProfileController::class, 'update'])->name('profile-update');
    Route::get('/profile/del/{id}', [MyProfileController::class, 'delete'])->name('profile-del');
    Route::get('/change_password', function (){
       return view('teacher.change-password');
    })->name('teach-change-password');

    Route::get('/delClass', [CreateClassController::class, 'delete'])
        ->name('createClass-del');
    Route::resources([
        'createClass' => CreateClassController::class,
        'createCourse' => CreateCourseController::class,
        'blog' => BlogController::class
    ], [
        'except' => ['destroy']
    ]);
    Route::get('/delete/course', [CreateCourseController::class, 'deleteCourse'])
        ->name('course-delete');
    Route::post('/course/video', [CreateCourseController::class, 'courseVideo'])
        ->name('course-video');
    Route::any('subscribe/plan', [StripePaymentController::class, 'stripe'])->name('subscribe-plan');
    Route::post('tech_stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
    Route::get('/delete/blog', [BlogController::class, 'deleteBlog'])
        ->name('blog-delete');

    Route::post('/charge', [PaymentController::class, 'charge']);
    Route::get('/status', [TeacherDashboardController::class, 'status'])
        ->name('status');
    Route::post('update/lec', [CreateCourseController::class, 'updateLecture'])
        ->name('update-lec');
    Route::get('/delete/lecture', [CreateCourseController::class, 'deleteLecture'])
        ->name('lec-delete');

    Route::post('/find_class', [Teacher::class, 'find_class']);
    Route::post('/find_course', [Teacher::class, 'teacherFindCourse']);
    Route::post('/find_student', [Teacher::class, 'teacherFindStudent']);
    Route::post('/find_notes', [Teacher::class, 'teacherFindNotes']);
    Route::get('/meeting', [Teacher::class, 'meeting'])->name('zoom-meeting');

    Route::get('/create_meeting', [Teacher::class, 'create_meeting'])->name('create_meeting');
    Route::post('/save_meeting', [Teacher::class, 'save_meeting']);
    Route::get('/history', [History::class, 'history'])
        ->name('history');
    Route::get('history/delete', [History::class, 'deletehistory']);
    Route::get('/withdraw', [Withdraw::class, 'index'])->name('withdraw');
    Route::post('/withdraw/payment', [Withdraw::class, 'withdrawPayment'])
        ->name('withdraw-payment');
    Route::post('/upload/vids', [CreateCourseController::class, 'uploadTeachVids'])
        ->name('vids-upload');
});

Route::group(['prefix' => 'student', 'middleware' => ['auth', 'verified', 'check_student'], 'as' => 'student.'], function () {

    Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-profile', [StudentDashboardController::class, 'myProfile'])->name('my-profile');
    Route::get('/my-stats', [StudentDashboardController::class, 'myStats'])->name('my-stats');
    Route::get('/history', [StudentDashboardController::class, 'history'])->name('history');
    Route::get('/notes', [StudentDashboardController::class, 'notes'])->name('notes');
    Route::get('/notes/create', [StudentDashboardController::class, 'createNotes'])->name('create-notes');
    Route::post('/add_note', [StudentDashboardController::class, 'storeNotes'])->name('store-notes');
    Route::get('/delete_note', [StudentDashboardController::class, 'deleteNotes'])->name('delete-notes');
    Route::get('/edit_note/{id}', [StudentDashboardController::class, 'editNotes']);
    Route::post('/update_note/{id}', [StudentDashboardController::class, 'updateNotes']);
    Route::get('/chat', [StudentDashboardController::class, 'chat'])->name('chat');
    Route::get('/price/menu', [StudentDashboardController::class, 'priceMenu'])->name('price-menu');
    Route::get('/courses', [StudentDashboardController::class, 'courses'])->name('courses');
    Route::get('/all_courses', [StudentDashboardController::class, 'allCourses'])->name('all-courses');
    Route::get('/my/courses', [StudentDashboardController::class, 'myCourses'])->name('my-courses');
    Route::get('/course/detail', [StudentDashboardController::class, 'courseDetail'])->name('course-detail');
    Route::get('/course/bookmark/{id}', [StudentDashboardController::class, 'bookMarkCourse'])->name('bookmark-course');
    Route::get('/bookmarked_courses', [StudentDashboardController::class, 'getBookmarkedCourses'])->name('get-bookmarked-courses');
    Route::get('/course/detail/{id}', [StudentDashboardController::class, 'courseDetail']);
    Route::get('/course/cart/{teach_id}', [StudentDashboardController::class, 'courseCart'])->name('add-to-cart');
    Route::get('/payment/type/{teach_id}', [StudentDashboardController::class, 'paymentType'])->name('payment-type');
    Route::get('/edit/class/{id}', [StudentDashboardController::class, 'editClass'])
        ->name('edit-class');
    Route::get('/detail/class/{id}', [StudentDashboardController::class, 'classDetail'])
        ->name('detail-class');
    Route::get('/delete/class', [StudentDashboardController::class, 'deleteClass'])
        ->name('delete-class');
    Route::get('/change/password', [StudentDashboardController::class, 'changePassword'])
        ->name('change-password');
    Route::get('/my/status', [StudentDashboardController::class, 'myStatus'])
        ->name('my-status');

    //teacher timeline
    Route::get('/teacher/timeline', [StudentDashboardController::class, 'teacherTimeline'])->name('teacher-timeline');
    //        Route::get('/teacher/profile', [StudentDashboardController::class, 'teacherProfile'])->name('teacher-profile');
    Route::get('/teacher/profile/{id}', [StudentDashboardController::class, 'teachercourses'])->name('teacher-profile');
    Route::post('/teacher/rating', [StudentDashboardController::class, 'rating'])
        ->name('rate-teacher');
        Route::get('/course_detail/{id}', [StudentDashboardController::class, 'teachercourseDetail'])->name('course-detail');
        Route::get('/purchased_course_detail/{id}', [StudentDashboardController::class, 'teacherperchasedcourseDetail'])->name('purchased-course-detail');
    Route::post('add_cart', [StudentDashboardController::class, 'addCart']);
    Route::get('/delete_cart', [StudentDashboardController::class, 'deleteCart']);
    Route::post('subscribe/plan', [StripePaymentController::class, 'studentstripe'])->name('subscribe-plan');
    Route::post('stripe', [StripePaymentController::class, 'stripestudentPost'])->name('stripe.post');
    Route::post('/profile/update', [MyProfileController::class, 'update'])
        ->name('profile-update');
    Route::get('delete_history', [StudentDashboardController::class, 'deletehistory']);
    Route::post('/charge', [PaymentController::class, 'stdcharge']);

    Route::post('/find_class', [Teacher::class, 'studentFindClass']);
    Route::post('/find_course', [Teacher::class, 'studentFindCourses']);
    Route::post('/find_my_course', [Teacher::class, 'studentFindMyCourses']);
    Route::post('/find_notes', [Teacher::class, 'studentFindNotes']);
    Route::get('/meeting', [Teacher::class, 'meeting'])->name('meeting');

    // Route::get('/create_meeting', [Teacher::class, 'create_meeting']);
    // Route::post('/save_meeting', [Teacher::class, 'save_meeting']);
    //Route::post('/find_teacher', [Teacher::class, 'studentFindTeacher']);

    //MCQs Section Routes
    Route::get('mcqs', [\App\Http\Controllers\Student\McqsController::class, 'mcqs'])->name('mcqs');
    Route::get('/mcqs/{id}', [\App\Http\Controllers\Student\McqsController::class, 'getMcqs'])->name('get-mcqs');
    Route::get('/mcqs/ques', [\App\Http\Controllers\Student\McqsController::class, 'getMCQsQuest'])->name('get-mcqs-ques');
    Route::get('/mcqs/ques/hjk', [\App\Http\Controllers\Student\McqsController::class, 'getMCQsQuest'])->name('get-mcqs-ques-hjk');
    Route::get('/get_correct_opt', [\App\Http\Controllers\Student\McqsController::class, 'getCorrecOpt'])->name('student-correct-opt');
    Route::get('/get_correct_stat', [\App\Http\Controllers\Student\McqsController::class, 'getCorrecStat'])->name('student-correct-stat');
    Route::get('test/get_correct_opt', [\App\Http\Controllers\Student\McqsController::class, 'getTestCorrecOpt'])->name('test-correct-opt');
//    Route::get('mcqs_instructions/{id}/{name}', [\App\Http\Controllers\Student\McqsController::class, 'instructionPage'])->name('instruction-page');
    Route::get('mcqs_instructions', [\App\Http\Controllers\Student\McqsController::class, 'instructionPage'])->name('instruction-page');
    Route::get('/pause-timer', [\App\Http\Controllers\Student\McqsController::class, 'pauseTimer'])->name('student-pause-timer');
    Route::get('/complete-quiz', [\App\Http\Controllers\Student\McqsController::class, 'completeQuiz'])->name('student-complete-quiz');

    Route::get('/my_mcq_ques', function (){
       return view('user.mcqs.mcqs-ques');
    })->name('my-questions');


    Route::get('/categories', function () {
        if(!auth()->user()->can('Mcqs'))
        {
            return redirect()->route('student.mcqs');
        }
        return view("student.quiz-cats");
    })->name('categories');

    Route::get('/mcqs_type/{id}/{testType}', [\App\Http\Controllers\Student\McqsController::class, 'mcqsTypeRecord'])->name('mcqs-types');
});

Route::get('/phpinfo', function () {
    return phpinfo();
});
Route::get('test/categories', [\App\Http\Controllers\Student\McqsController::class, 'getTestCategories'])->name('test.categories');

Route::group(['prefix' => 'student', 'middleware' => ['auth', 'verified', 'check_student']], function () {

    Route::get('test/mcqs/{id}', [\App\Http\Controllers\Student\McqsController::class, 'getTestMcqs'])->name('test-get-mcqs');
    Route::get('test/mcqs/ques/{id}/{name}', [\App\Http\Controllers\Student\McqsController::class, 'getTestMCQsQuest'])->name('test-get-mcqs-ques');
});

//user main pages
Route::get('/', [FrontController::class, 'index'])->name('user-dashboard');
Route::get('/contact_us', function () {
    return view('user.contact');
})->name('contact-us');

Route::get('/courses/{id}', function ($id) {
    $test_id = decrypt($id);
    return view('user.courses', compact('test_id'));
})->name('user-courses');

Route::get('/featured_courses', function () {
    return view('user.featured-courses');
})->name('user-featured-courses');

Route::get('/course_detail', function () {
    return view('user.course-detail');
})->name('user-course-detail');

Route::get('/all_instructors', function () {
    return view('user.instructors');
})->name('user-instructors');

Route::get('/instructor_detail', function () {
    return view('user.instructor-detail');
})->name('user-instructor-detail');

Route::get('/blogs', function () {
    return view('user.blogs');
})->name('user-blogs');

Route::get('/blog_details', function () {
    return view('user.blog-detail');
})->name('user-blog-details');

Route::get('/payment_methods', function () {
    $btn = true;
    if (auth()->check()) {
        $TestMcqs = auth()->user()->getTestMcqs;
        if ($TestMcqs) {
            if ($TestMcqs->status == 1)
                $btn = false;
        }
    }
    return view('user.payment-cards', compact('btn'));
})->name('user-payment-methods');

Route::get('/about_us', function () {
    return view('user.about-us');
})->name('user-about-us');

Route::post('/payment_plan', [PaymentController::class, 'paymentPlan'])->name('paymnt-plan');
Route::get('/updateNotif/{notif_id}/{p_id}', [PaymentController::class,'userUpdateNotification'])->name('user-update-notif');

Route::get('/blog_detail/{blog}', function ($a){
   $blog_num = decrypt($a);
   if($blog_num == '1'){
       return view('user.blog-1');
   } elseif ($blog_num == '2'){
       return view('user.blog-2');
   } elseif ($blog_num == '3'){
       return view('user.blog-3');
   } else{
       return view('user.blog-4');
   }
})->name('blog-details');

Route::get('/course_detail/{course}', function ($c){
    $course_num = decrypt($c);

    if($course_num == '1'){
        return view('user.course-1');
    } elseif ($course_num == '2'){
        return view('user.course-2');
    } else{
        return view('user.course-3');
    }
})->name('course-details');


Route::post('create/blog/post', [BlogController::class, 'storeBlog'])->name('blog-create');
Route::post('/reset/password', [MyProfileController::class, 'resetPassword'])
    ->name('reset-password');
Route::get('/change/password', [TeacherDashboardController::class, 'changePassword'])
    ->name('change-password');

Route::get('/zip/{name}', [ZipController::class, 'zipFile']);
Route::get('/meeting', [Teacher::class, 'std_meeting']);

Route::post('/main_find_course', [Teacher::class, 'mainFindCourse']);

Route::get('/zip/{name}/{live}', [ZipController::class, 'zipFile'])
    ->name('zip-file');

//broadcasting
Route::get('/streaming', [WebrtcStreamingController::class, 'index']);
Route::get('/streaming/{streamId}', [WebrtcStreamingController::class, 'consumer']);
Route::post('/stream-offer', [WebrtcStreamingController::class, 'makeStreamOffer']);
Route::post('/stream-answer', [WebrtcStreamingController::class, 'makeStreamAnswer']);



Route::get('/blog/detail/{id}', [MainBlogController::class, 'blogDetail'])
    ->name('blog-detail');

//user main view
//Route::get('/contact', [ContactController::class, 'index']);
//Route::post('/contact', [ContactController::class, 'storeContact'])
//                                                    ->name('contact');

Route::get('/features', function () {
    return view('features');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/home2', function () {
    return view('home2');
});
Route::get('/student-dashboard', function () {
    return view('home3');
});
Route::get('/dhome3', function () {
    return view('dhome3');
});
Route::get('/home4', function () {
    return view('home4');
});
Route::get('/teacher/profile', function () {
    return view('home5');
})->name('test');


Route::get('/home7', function () {
    return view('home7');
});
Route::get('/home8', function () {
    return view('home8');
});
Route::get('/home9', function () {
    return view('home9');
});
Route::get('/home10', function () {
    return view('home10');
});
Route::get('/home11', function () {
    return view('home11');
});
Route::get('/rating', function () {
    return view('rating');
});


Route::get('/term', function () {
    return view('term_condition');
});

Route::get('/policy', function () {
    return view('policy');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
})->name('all-blogs');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog_detail', function () {
    return view('blog_detail');
});




Route::get('success', [PaymentController::class, 'success']);
Route::get('success2', [PaymentController::class, 'success2']);



Route::get('/streaming', [WebrtcStreamingController::class, 'index']);
Route::get('/streaming/{streamId}', [WebrtcStreamingController::class, 'consumer']);
Route::post('/stream-offer', [WebrtcStreamingController::class, 'makeStreamOffer']);
Route::post('/stream-answer', [WebrtcStreamingController::class, 'makeStreamAnswer']);


Route::get('/test_pagination', function () {
   dd((new \App\Models\McqQuestion())->getQuestions(10)); // works fine bro try like this
});
