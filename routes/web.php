<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupMemberController;
use App\Http\Controllers\Group_member;
use App\Http\Controllers\UserJobsController;
use App\Http\Controllers\HackerthonController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PromptsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\TopicLikeController;
use App\Http\Controllers\TopicCircleController;
use App\Http\Controllers\CommentlikesController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentPromptsController;
use App\Http\Controllers\CommentFilesController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('wp.home0');
});

Route::get('/community', [NavigationController::class, 'community'])->name('community');
Route::get('/learning', [NavigationController::class, 'learning'])->name('learning');

Route::get('/themes', [NavigationController::class, 'themes'])->name('themes');
Route::get('/topics', [NavigationController::class, 'topics'])->name('topics');
Route::get('/topics/details/{topic}', [NavigationController::class, 'topicsDetails'])->name('topics.details');

Route::get('/topics/content/details/{content}', [NavigationController::class, 'contentsDetails'])->name('topics.content.details');
Route::post('/topics/content/details/{content}', [CommentFilesController::class, 'post']);
Route::get('/topics/takequiz/{exercise}', [NavigationController::class, 'takeQuiz'])->name('topics.takequiz');
Route::post('/topics/takequiz/{exercise}', [ResponseController::class, 'post']);
Route::get('/topics/prompts/{prompts}', [NavigationController::class, 'promptDetails'])->name('topics.prompts');
Route::post('/topics/prompts/{prompts}', [CommentPromptsController::class, 'post']);


Route::get('/discussion', [NavigationController::class, 'discussion'])->name('discussion');
Route::get('/discussion/details/{discussion}', [NavigationController::class, 'discussion_details'])->name('discussion.details');
Route::post('/discussion/details/{discussion}', [NavigationController::class, 'registerTo_discussion']);

Route::get('/learning/course/{course}', [NavigationController::class, 'course_details'])->name('learning.course');
Route::post('/learning/course/{course}', [CourseUserController::class, 'takecourse']);

Route::get('/learning/course/lesson/{lesson}', [NavigationController::class, 'lesson_details'])->name('learning.course.lesson');

Route::get('/discussion/topic/{discussion}', [NavigationController::class, 'discussion_details'])->name('discussion.topic');


Route::get('/discussion/topic/messages/{topic}', [NavigationController::class, 'topic_discussion'])->name('discussion.topic.messages');
Route::post('/discussion/topic/messages/{topic}', [NavigationController::class, 'comment_topic']);

// user messages here
Route::get('/discussion/user/messages/{user:name}/posts', [UserMessageController::class, 'index'])->name('discussion.user.messages.posts');

// Route::get('/circle/topic/messages/{topic}', [NavigationController::class, 'topic_circle'])->name('circle.topic.messages');
// Route::post('/circle/topic/messages/{topic}', [NavigationController::class, 'comment_topic_circle']);

Route::post('/discussion/topic/messages/{topic}/likes', [TopicLikeController::class, 'like'])->name('discussion.topic.messages.likes');
Route::delete('/discussion/topic/messages/{topic}/likes', [TopicLikeController::class, 'destroy'])->name('discussion.topic.messages.likes');

Route::post('/discussion/topic/messages/{message}/likescomment', [CommentlikesController::class, 'store'])->name('discussion.topic.messages.likescomment');
Route::delete('/discussion/topic/messages/{message}/likescomment', [CommentlikesController::class, 'destroy'])->name('discussion.topic.messages.likescomment');
Route::delete('/discussion/topic/messages/{message}', [MessageController::class, 'destroy'])->name('discussion.topic.messages');



Route::get('/groups', [NavigationController::class, 'groups'])->name('groups');
Route::get('/groups_details/{group}', [NavigationController::class, 'circle_details'])->name('groups_details');
Route::get('/groups/members/{group}', [NavigationController::class, 'group_member'])->name('groups.members');
Route::get('/groups/members/joined/{group}', [NavigationController::class, 'joined'])->name('groups.members.joined');

Route::delete('/groups/members/unjoin/{group}', [NavigationController::class, 'unjoin'])->name('groups.members.unjoin');
Route::post('/groups_details/{group}', [NavigationController::class, 'join_member']);

Route::get('/groups/members/topics/{topic_circle}', [NavigationController::class, 'group_topic_message'])->name('groups.members.topics');
Route::post('/groups/members/topics/{topic_circle}', [NavigationController::class, 'circle_topic_message']);

Route::get('/hackathons', [NavigationController::class, 'hackathons'])->name('hackathons');
Route::get('/hackathons/details/{hackerthon}', [NavigationController::class, 'details'])->name('hackathons.details');
Route::post('/hackathons/details/{hackerthon}', [CompetitorController::class, 'adduser']);
Route::delete('/hackathons/members/unjoin/{hackerthon}', [NavigationController::class, 'unjoinhackathon'])->name('hackathons.members.unjoin');

Route::get('/hackathons/participants/{hackerthon}', [NavigationController::class, 'hackathon_participants'])->name('hackathons.participants');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/home', [LogoutController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dash', [DashboardController::class, 'dash'])->name('dash');

Route::get('/user/{user:name}/profile', [ProfileController::class, 'index'])->name('users.profile');
Route::post('/user/{user:name}/profile', [ProfileController::class, 'upload']);
Route::get('/user/{user:name}/update-profile', [ProfileController::class, 'update'])->name('user.update-profile');
Route::post('/user/{user:name}/update-profile', [ProfileController::class, 'store']);

Route::get('/user/{user:name}/score', [ScoreController::class, 'index'])->name('users.score');


Route::get('/user/{user:name}/course', [CourseController::class, 'index'])->name('users.course');
Route::delete('/user/{user:name}/course/delete/{course}', [CourseController::class, 'destroy'])->name('users.course.delete');

Route::get('/user/{user:name}/course/manage/{course}', [CourseController::class, 'manage'])->name('users.course.manage');
Route::post('/user/{user:name}/course/manage/{course}/saveCourseUser', [CourseController::class, 'saveCourseUser'])->name('users.course.manage.saveCourseUser');


Route::get('/user/{user:name}/createcourse', [CourseController::class, 'create'])->name('users.createcourse');
Route::post('/user/{user:name}/createcourse', [CourseController::class, 'store']);

Route::get('/user/{user:name}/createlessons/{course}', [LessonsController::class, 'index'])->name('users.createlessons');
Route::post('/user/{user:name}/createlessons/{course}', [LessonsController::class, 'store']);

Route::get('/user/{user:name}/lesson/details/{lesson}', [LessonsController::class, 'details'])->name('users.lesson.details');

Route::delete('/user/{user:name}/lessons/delete/{lesson}', [LessonsController::class, 'destroy'])->name('users.lessons.delete');

Route::get('/user/{lesson:title}/updatelessons', [LessonsController::class, 'update'])->name('users.updatelessons');
Route::post('/user/{lesson:title}/updatelessons', [LessonsController::class, 'updatestore']);

Route::get('/user/{user:name}/group', [GroupController::class, 'index'])->name('users.group');
Route::delete('/user/{user:name}/group/delete/{group}', [GroupController::class, 'destroy'])->name('users.group.delete');

Route::get('/user/{user:name}/group/manage/{group}', [GroupController::class, 'manage'])->name('users.group.manage');

Route::get('/user/{user:name}/creategroups', [GroupController::class, 'create'])->name('users.creategroups');
Route::post('/user/{user:name}/creategroups', [GroupController::class, 'store']);

Route::get('/user/{group:name}/addmember', [GroupMemberController::class, 'add'])->name('group.addmember');
Route::post('/user/{group:name}/addmember', [GroupMemberController::class, 'adduser']);

Route::get('/user/{user:name}/jobs', [UserJobsController::class, 'index'])->name('users.jobs');
Route::get('/user/{user:name}/jobs/manage/{jobs}', [UserJobsController::class, 'manage'])->name('users.jobs.manage');

Route::get('/user/{user:name}/addjob', [UserJobsController::class, 'addjob'])->name('users.addjob');
Route::post('/user/{user:name}/addjob', [UserJobsController::class, 'storejob']);

Route::get('/user/{user:name}/hackerthon', [HackerthonController::class, 'index'])->name('users.hackerthon');
Route::delete('/user/{user:name}/hackerthon/delete/{hackerthon}', [HackerthonController::class, 'destroy'])->name('users.hackerthon.delete');

Route::get('/user/{user:name}/hackerthon/manage/{hackerthon}', [HackerthonController::class, 'manage'])->name('users.hackerthon.manage');
Route::get('/user/{user:name}/hackerthon/manage/competitors/{hackerthon}', [HackerthonController::class, 'competitors'])->name('users.hackerthon.manage.competitors');
Route::get('/user/{user:name}/create_hackerthon', [HackerthonController::class, 'create'])->name('users.create_hackerthon');
Route::post('/user/{user:name}/create_hackerthon', [HackerthonController::class, 'store']);

Route::get('/user/{hackerthon:id}/update_hackerthon', [HackerthonController::class, 'update'])->name('users.update_hackerthon');
Route::post('/user/{user:name}/update/hackerthon/{hackerthon}', [HackerthonController::class, 'updatestore'])->name('users.update.hackerthon');

Route::get('/user/{user:name}/discussion', [DiscussionController::class, 'index'])->name('users.discussion');
Route::delete('/user/{user:name}/discussion/delete/{discussion}', [DiscussionController::class, 'destroy'])->name('users.discussion.delete');

Route::get('/user/{user:name}/discussion/manage/{discussion}', [DiscussionController::class, 'manage'])->name('users.discussion.manage');
Route::get('/user/{discussion}/discussion/add_cover', [DiscussionController::class, 'add_cover'])->name('users.discussion.add_cover');
Route::post('/user/{discussion}/discussion/add_cover', [DiscussionController::class, 'upload']);


Route::get('/user/{user:name}/topics', [TopicController::class, 'adminTopics'])->name('users.topics');
Route::delete('/user/{user:name}/topics/delete/{topic}', [TopicController::class, 'destroy'])->name('users.topics.delete');

Route::get('/user/{user:name}/topics/manage/{topic}', [TopicController::class, 'manage'])->name('users.topics.manage');


Route::get('/user/{user:name}/creatediscussion', [DiscussionController::class, 'create'])->name('users.creatediscussion');
Route::post('/user/{user:name}/creatediscussion', [DiscussionController::class, 'store']);

Route::get('/user/{user:name}/updatediscussion/{discussion}', [DiscussionController::class, 'update'])->name('users.updatediscussion');
Route::post('/user/{user:name}/savediscussion/{discussion}', [DiscussionController::class, 'storeupdates'])->name('users.savediscussion');


Route::get('/topiccircle/{group:id}/createcirclediscussion', [TopicCircleController::class, 'indexcircle'])->name('topiccircle.createcirclediscussion');
Route::post('/topiccircle/{group:id}/createcirclediscussion', [TopicCircleController::class, 'storecircle']);

Route::get('/user/{user:name}/createtopics', [TopicController::class, 'index'])->name('users.createtopics');
Route::post('/user/{user:name}/createtopics', [TopicController::class, 'store']);

Route::get('/user/{topic:topic}/updatetopics', [TopicController::class, 'update'])->name('users.updatetopics');
Route::post('/user/{topic:topic}/updatetopics', [TopicController::class, 'updatestore']);

Route::get('/user/{topic}/addcontent', [ContentController::class, 'index'])->name('users.addcontent');
Route::post('/user/{topic}/addcontent', [ContentController::class, 'register']);
Route::delete('/user/{user:name}/deletecontents/{content}', [ContentController::class, 'delete'])->name('users.deletecontents');

Route::get('/user/{topic}/addprompt', [PromptsController::class, 'index'])->name('users.addprompt');
Route::post('/user/{topic}/addprompt', [PromptsController::class, 'upload']);
Route::delete('/user/{user:name}/deleteprompts/{prompts}', [PromptsController::class, 'delete'])->name('users.deleteprompts');

Route::get('/user/{user:name}/{topic}/addexercise', [ExerciseController::class, 'createExercise'])->name('users.addexercise');
Route::get('/user/{topic}/takeexercise', [ExerciseController::class, 'take'])->name('users.takeexercise');
Route::post('/user/{user:name}/{topic}/addexercise', [ExerciseController::class, 'register']);
Route::delete('/user/{user:name}/deleteexercise/{exercise}', [ExerciseController::class, 'delete'])->name('users.deleteexercise');

Route::get('/user/calendardiscussion', [CalenderController::class, 'index'])->name('users.calendardiscussion');
Route::get('/user/calendardiscussion/{user:name}', [CalenderController::class, 'mycalendar'])->name('users.calendardiscussion.mycalendar');
Route::post('/user/calendardiscussion', [CalenderController::class, 'filter']);

Route::get('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'index'])->name('fullcalendareventmaster');
Route::post('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'create']);
Route::post('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'update']);
Route::post('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'destroy']);


Route::get('/setting/{user:name}', [AdminController::class, 'index'])->name('setting');
Route::post('/setting/{user:name}', [AdminController::class, 'admin']);
Route::post('/setting/{user:name}/saveCourse/{course}', [AdminController::class, 'saveCourse'])->name('setting.saveCourse');
Route::post('/setting/{user:name}/saveDiscussion/{discussion}', [AdminController::class, 'saveDiscussion'])->name('setting.saveDiscussion');
Route::post('/setting/{user:name}/saveTopic/{topic}', [AdminController::class, 'saveTopic'])->name('setting.saveTopic');
Route::post('/setting/{user:name}/saveHackathon/{hackerthon}', [AdminController::class, 'saveHackathon'])->name('setting.saveHackathon');
Route::get('/setting/{user:name}/grant-admin', [AdminController::class, 'find'])->name('setting.grant-admin');






Route::get('/createQuestion/{topic}', [QuestionController::class, 'createQuestion'])->name('createQuestion');

Route::get('/detailQuestion/{question}', [QuestionController::class, 'detailQuestion'])
    ->name('detailQuestion');

Route::post('/storeQuestion/{topic}', [QuestionController::class, 'storeQuestion'])->name('storeQuestion');
Route::post('/deleteQuestion/{id}', [QuestionController::class, 'deleteQuestion'])->name('deleteQuestion');


// Route::middleware(['auth', 'verified', 'role:admin|user'])->prefix('appuser')->group(function () {

//     Route::get('/userQuizHome', [AppUserController::class, 'userQuizHome'])
//         ->name('userQuizHome');

//     Route::get('/userQuizDetails/{id}', [AppUserController::class, 'userQuizDetails'])
//         ->name('userQuizDetails');

//     Route::post('/deleteUserQuiz/{id}', [AppUserController::class, 'deleteUserQuiz'])
//         ->name('deleteUserQuiz');

//     Route::get('/startQuiz', [AppUserController::class, 'startQuiz'])
//         ->name('startQuiz');
// });