<?php

namespace App\Providers;

use App\Models\Content as ModelsContent;
use App\Models\Course as ModelsCourse;
use App\Models\Progress as ModelsProgress;
use App\Models\Question as ModelsQuestion;
use App\Models\Quiz as ModelsQuiz;
use App\Models\Organization as ModelsOrganization;
use App\Models\Department as ModelsDepartment;
use App\Models\User as ModelsUser;
use App\Models\Document as ModelsDocument;
use App\Models\ZoomMeeting as ModelsZoomMeeting;
use App\Nova\Content;
use App\Nova\Course;
use App\Nova\Dashboards\Main;
use App\Nova\Progress;
use App\Nova\Question;
use App\Nova\Quiz;
use App\Nova\Role;
use App\Nova\Organization;
use App\Nova\Department;
use App\Nova\Document;
use App\Nova\User;
use App\Nova\ZoomMeeting;
use Bolechen\NovaActivitylog\Resources\Activitylog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Pktharindu\NovaPermissions\Role as ModelsRole;
use SimonHamp\LaravelNovaCsvImport\LaravelNovaCsvImport;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public static $model = 'App\\Models\\User';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::style('admin', asset('css/nova.css'));

        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 9999;
        });

        Nova::withBreadcrumbs();

        Nova::footer(function ($request) {
            return Blade::render('
                <center>Copyright &copy; ' . now()->year . ' Zuse Technologies (Pvt) Ltd. All Rights Reserved.<br/>Based on the Zuse Backend Foundation. Created by Zuse Technologies (Pvt) Ltd.</center>
            ');
        });

        Nova::mainMenu(function (Request $request, Menu $menu) {
            return [
                MenuSection::make('Dashboard', [
                    MenuGroup::make('Dashboards', [
                        MenuItem::dashboard(Main::class)->icon('home'),
                    ]),
                    MenuGroup::make('Logging', [
                        MenuItem::resource(Activitylog::class)->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M311.9 166.1L112 366.1l0-36c0-55.2 21.9-108.1 60.9-147.1L276.7 79.2c20-20 47.1-31.2 75.3-31.2s55.3 11.2 75.3 31.2l5.5 5.5c20 20 31.2 47.1 31.2 75.3c0 16.8-4 33.3-11.4 48H337.9l7.9-7.9c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0zm-22 89.9H412.1l-48 48H241.9l48-48zm24.9 96c-37.2 30.9-84.2 48-132.9 48h-36l48-48H314.9zM64 330v84L7 471c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l57-57h84c67.9 0 133-27 181-75L466.7 269.3c29-29 45.3-68.3 45.3-109.3s-16.3-80.3-45.3-109.3l-5.5-5.5C432.3 16.3 393 0 352 0s-80.3 16.3-109.3 45.3L139 149C91 197 64 262.1 64 330z"></path></svg>'
                        )
                    ]),
                ]),

                MenuSection::make('Manage', [
                    MenuGroup::make('Course Management', [
                        MenuItem::resource(Course::class)->withBadge(fn() => ModelsCourse::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M512 337.2V52.4L344 77V373l168-35.8zM296 373V77L128 52.4V337.2L296 373zM523.4 2.2C542.7-.7 560 14.3 560 33.8V350.1c0 15.1-10.6 28.1-25.3 31.3l-201.3 43c-8.8 1.9-17.9 1.9-26.7 0l-201.3-43C90.6 378.3 80 365.2 80 350.1V33.8C80 14.3 97.3-.7 116.6 2.2L320 32 523.4 2.2zM38.3 23.7l10.2 2c-.3 2.7-.5 5.4-.5 8.1V74.6 342.1v66.7l265.8 54.5c2 .4 4.1 .6 6.2 .6s4.2-.2 6.2-.6L592 408.8V342.1 74.6 33.8c0-2.8-.2-5.5-.5-8.1l10.2-2C621.5 19.7 640 34.8 640 55V421.9c0 15.2-10.7 28.3-25.6 31.3L335.8 510.4c-5.2 1.1-10.5 1.6-15.8 1.6s-10.6-.5-15.8-1.6L25.6 453.2C10.7 450.2 0 437.1 0 421.9V55C0 34.8 18.5 19.7 38.3 23.7z"></path></svg>'
                        ),
                        MenuItem::resource(Content::class)->withBadge(fn() => ModelsContent::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M400 128V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V128H400zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM96 200c0 13.3 10.7 24 24 24H328c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-13.3 0-24 10.7-24 24zm0 96c0 13.3 10.7 24 24 24H328c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-13.3 0-24 10.7-24 24zm0 96c0 13.3 10.7 24 24 24H232c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-13.3 0-24 10.7-24 24z"></path></svg>'
                        ),
                        MenuItem::resource(ZoomMeeting::class)->withBadge(fn() => ModelsZoomMeeting::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M400 128V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V128H400zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM96 200c0 13.3 10.7 24 24 24H328c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-13.3 0-24 10.7-24 24zm0 96c0 13.3 10.7 24 24 24H328c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-13.3 0-24 10.7-24 24zm0 96c0 13.3 10.7 24 24 24H232c13.3 0 24-10.7 24-24s-10.7-24-24-24H120c-13.3 0-24 10.7-24 24z"></path></svg>'
                        ),
                    ]),
                    MenuGroup::make('Quiz Management', [
                        MenuItem::resource(Quiz::class)->withBadge(fn() => ModelsQuiz::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M88.2 309.1c9.8-18.3 6.8-40.8-7.5-55.8C59.4 230.9 48 204 48 176c0-63.5 63.8-128 160-128s160 64.5 160 128s-63.8 128-160 128c-13.1 0-25.8-1.3-37.8-3.6c-10.4-2-21.2-.6-30.7 4.2c-4.1 2.1-8.3 4.1-12.6 6c-16 7.2-32.9 13.5-49.9 18c2.8-4.6 5.4-9.1 7.9-13.6c1.1-1.9 2.2-3.9 3.2-5.9zM208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 41.8 17.2 80.1 45.9 110.3c-.9 1.7-1.9 3.5-2.8 5.1c-10.3 18.4-22.3 36.5-36.6 52.1c-6.6 7-8.3 17.2-4.6 25.9C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.8-2.2 9.6-4.5 14.2-6.8c15.1 3 30.9 4.5 47.1 4.5zM432 480c16.2 0 31.9-1.6 47.1-4.5c4.6 2.3 9.4 4.6 14.2 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.8 2-19-4.6-25.9c-14.2-15.6-26.2-33.7-36.6-52.1c-.9-1.7-1.9-3.4-2.8-5.1C622.8 384.1 640 345.8 640 304c0-94.4-87.9-171.5-198.2-175.8c4.1 15.2 6.2 31.2 6.2 47.8l0 .6c87.2 6.7 144 67.5 144 127.4c0 28-11.4 54.9-32.7 77.2c-14.3 15-17.3 37.6-7.5 55.8c1.1 2 2.2 4 3.2 5.9c2.5 4.5 5.2 9 7.9 13.6c-17-4.5-33.9-10.7-49.9-18c-4.3-1.9-8.5-3.9-12.6-6c-9.5-4.8-20.3-6.2-30.7-4.2c-12.1 2.4-24.8 3.6-37.8 3.6c-61.7 0-110-26.5-136.8-62.3c-16 5.4-32.8 9.4-50 11.8C279 439.8 350 480 432 480zM184.3 86.3c-16.4 0-31 10.3-36.4 25.7l-.3 .9c-3 8.3 1.4 17.5 9.7 20.4s17.5-1.4 20.4-9.7l.3-.9c.9-2.7 3.5-4.4 6.3-4.4h41.3c6.5 0 11.7 5.3 11.7 11.7c0 4.2-2.2 8.1-5.9 10.2l-31.4 18c-5 2.9-8 8.1-8 13.9v9.5c0 8.8 7.2 16 16 16s16-7.2 16-16v-.3L247.4 168c13.6-7.8 22-22.3 22-37.9c0-24.2-19.6-43.7-43.7-43.7H184.3zM208 266.7a22.7 22.7 0 1 0 0-45.3 22.7 22.7 0 1 0 0 45.3zm331.3 22c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0l-74 74-31.4-31.4c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L431.4 374c6.2 6.2 16.4 6.2 22.6 0l85.3-85.3z"></path></svg>'
                        ),
                        MenuItem::resource(Question::class)->withBadge(fn() => ModelsQuestion::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M176 112c12.7 0 24.9-5.1 33.9-14.1L256 51.9l46.1 46.1c9 9 21.2 14.1 33.9 14.1h64v64c0 12.7 5.1 24.9 14.1 33.9l45.6 45.6-45.6 45.6c-9 9-14.1 21.2-14.1 33.9V400H335.1c-12.7 0-24.9 5.1-33.9 14.1L256 459.2l-45.1-45.1c-9-9-21.2-14.1-33.9-14.1H112V335.1c0-12.7-5.1-24.9-14.1-33.9L52.4 255.5l45.6-45.6c9-9 14.1-21.2 14.1-33.9V112h64zM289.9 17.9c-18.7-18.7-49.1-18.7-67.9 0L176 64H112c-26.5 0-48 21.5-48 48v64L18.4 221.6c-18.7 18.7-18.7 49.1 0 67.9L64 335.1V400c0 26.5 21.5 48 48 48h64.9l45.1 45.1c18.7 18.7 49.1 18.7 67.9 0L335.1 448H400c26.5 0 48-21.5 48-48V335.1l45.6-45.6c18.7-18.7 18.7-49.1 0-67.9L448 176V112c0-26.5-21.5-48-48-48H336L289.9 17.9zM169.8 165.3l-.4 1.2c-4.4 12.5 2.1 26.2 14.6 30.6s26.2-2.1 30.6-14.6l.4-1.2c1.1-3.2 4.2-5.3 7.5-5.3h58.3c8.4 0 15.1 6.8 15.1 15.1c0 5.4-2.9 10.4-7.6 13.1l-44.3 25.4c-7.5 4.3-12.1 12.2-12.1 20.8V264c0 13.3 10.7 24 24 24c13.1 0 23.8-10.5 24-23.6l32.3-18.5c19.6-11.3 31.7-32.2 31.7-54.8c0-34.9-28.3-63.1-63.1-63.1H222.6c-23.7 0-44.8 14.9-52.8 37.3zM288 352a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"></path></svg>'
                        ),
                    ]),
                ])->icon('academic-cap'),

                MenuSection::make('Assessment', [
                    MenuGroup::make('Progression', [
                        MenuItem::resource(Progress::class)->withBadge(fn() => ModelsProgress::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"><path d="M288 0H400c8.8 0 16 7.2 16 16V80c0 8.8-7.2 16-16 16H318.1l89.6 64H504c39.8 0 72 32.2 72 72V440c0 39.8-32.2 72-72 72H336 240 72c-39.8 0-72-32.2-72-72V232c0-39.8 32.2-72 72-72h96.3L264 91.6V24c0-13.3 10.7-24 24-24zM504 464c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H400c-5 0-9.9-1.6-13.9-4.5l-98.1-70-98.1 70c-4.1 2.9-8.9 4.5-13.9 4.5H72c-13.3 0-24 10.7-24 24V440c0 13.3 10.7 24 24 24H240V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64H504zM240 240a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM112 256h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16zm304 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H432c-8.8 0-16-7.2-16-16V272zM112 352h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm320 0h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H432c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16z"></path></svg>'
                        ),
                    ]),
                    MenuGroup::make('Reports and Reviews', [
                        MenuItem::dashboard(Main::class)->icon('tag'),
                    ]),
                ])->icon('book-open'),

                MenuSection::make('Vault', [
                    MenuGroup::make('Document Management', [
                        MenuItem::resource(Document::class)->withBadge(fn() => ModelsDocument::count(), 'info')->icon('newspaper'),
                    ]),
                ])->icon('lock-open'),

                MenuSection::make('System', [
                    MenuGroup::make('Manage Institutions', [
                        MenuItem::resource(Organization::class)->withBadge(fn() => ModelsOrganization::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"><path d="M288 0H400c8.8 0 16 7.2 16 16V80c0 8.8-7.2 16-16 16H318.1l89.6 64H504c39.8 0 72 32.2 72 72V440c0 39.8-32.2 72-72 72H336 240 72c-39.8 0-72-32.2-72-72V232c0-39.8 32.2-72 72-72h96.3L264 91.6V24c0-13.3 10.7-24 24-24zM504 464c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H400c-5 0-9.9-1.6-13.9-4.5l-98.1-70-98.1 70c-4.1 2.9-8.9 4.5-13.9 4.5H72c-13.3 0-24 10.7-24 24V440c0 13.3 10.7 24 24 24H240V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64H504zM240 240a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM112 256h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16zm304 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H432c-8.8 0-16-7.2-16-16V272zM112 352h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm320 0h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H432c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16z"></path></svg>'
                        ),
                        MenuItem::resource(Department::class)->withBadge(fn() => ModelsDepartment::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M333.3 4c-8.1-5.4-18.6-5.4-26.6 0l-138 92H72C32.2 96 0 128.2 0 168V440c0 39.8 32.2 72 72 72H256 384h10.8C349.5 480.1 320 427.5 320 368c0-16.5 2.3-32.5 6.5-47.7c-2.1-.2-4.3-.3-6.5-.3c-35.3 0-64 28.7-64 64v80H72c-13.3 0-24-10.7-24-24V168c0-13.3 10.7-24 24-24H176c4.7 0 9.4-1.4 13.3-4L320 52.8 450.7 140c3.9 2.6 8.6 4 13.3 4H568c13.3 0 24 10.7 24 24v52.5c18.8 12.3 35.1 28 48 46.3V168c0-39.8-32.2-72-72-72H471.3L333.3 4zm20.2 260.6c10.9-15 24.1-28.2 39.1-39.1c4.7-10.2 7.3-21.5 7.3-33.5c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80c12 0 23.3-2.6 33.5-7.3zM96 208v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zm16 112c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V336c0-8.8-7.2-16-16-16H112zM320 144c8.8 0 16 7.2 16 16v16h8c8.8 0 16 7.2 16 16s-7.2 16-16 16H320c-8.8 0-16-7.2-16-16V160c0-8.8 7.2-16 16-16zM640 368a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zm-99.3-43.3c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6l-72 72c-6.2 6.2-16.4 6.2-22.6 0l-40-40c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L480 385.4l60.7-60.7z"></path></svg>'
                        ),
                    ])->collapsable(),
                    MenuGroup::make('User Management', [
                        MenuItem::resource(User::class)->withBadge(fn() => ModelsUser::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M224 208a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM49.3 464H336.6c3.3 4.2 6.7 8.2 10.3 12c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304H224h45.7c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-3.6 2.3-7 5.1-9.9 8.4c-14.4-5.5-30.1-8.5-46.5-8.5H178.3c-65.7 0-120.1 48.7-129 112zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z"></path></svg>'
                        ),
                    ]),
                    MenuGroup::make('Roles & Permissions', [
                        MenuItem::resource(Role::class)->withBadge(fn() => ModelsRole::count(), 'info')->icon(
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M224 208a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM398.7 464c-.5-3.4-1.1-6.7-1.8-10l45.6 45.6c-5.4 7.5-14.2 12.5-24.2 12.5H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304H224h45.7c17.5 0 34.3 2.5 50.3 7.2v33c0 6.4 .8 12.7 2.3 18.8c-16.1-7.1-33.9-11-52.6-11H178.3c-65.7 0-120.1 48.7-129 112H398.7zM384 224h82.7c17 0 33.3 6.7 45.3 18.7L619.3 350.1c18.7 18.7 18.7 49.1 0 67.9l-73.4 73.4c-18.7 18.7-49.1 18.7-67.9 0L370.7 384c-12-12-18.7-28.3-18.7-45.3V256c0-17.7 14.3-32 32-32zm72 80a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"></path></svg>'
                        ),
                    ]),
                ])->icon('cog'),
            ];
        });

        Nova::userMenu(function (Request $request, Menu $menu) {
            $menu->prepend(
                MenuItem::externalLink('My Profile', Nova::url('resources/' . User::uriKey() . '/' . Nova::user()->id)),
            );

            return $menu;
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Pktharindu\NovaPermissions\NovaPermissions::make()
                ->roleResource(Role::class),
            new \Bolechen\NovaActivitylog\NovaActivitylog(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function mainMenu(Request $request)
    {
        return [
            // Your other menu sections...
        ];
    }
}
