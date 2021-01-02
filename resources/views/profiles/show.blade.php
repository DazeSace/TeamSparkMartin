@extends('layouts.app')

@section('content')
    <div class="mt-16 mb-6">
        <div class="flex w-10/12 mx-auto justify-center lg:justify-end mb-4 ">
            @if ($user == Auth::user())
                    <a href="{{ route('profiles.edit', $user) }}"
                       class="border-secondary border-2 px-6 py-2 text-sm font-semibold rounded-lg ">Profil
                        bearbeiten</a>
            @endif
        </div>
        <div class="flex flex-col mb-10 lg:flex-row ">
            <div class="lg:w-1/3 ">
                <div class="">
                    <img src="{{ $user->getAvatar() }}"
                         alt="img"
                         class="mx-auto rounded-full w-1/3 mb-6">
                </div>

                <p class="text-secondary uppercase text-xl font-semibold text-center">{{ $user-> firstName}} {{ $user-> lastName}}</p>
                <p class="text-secondary text-center"> @ {{ $user ->username }}</p>
                @if($user == Auth::user() || $user->showMail)

                    <p class="text-secondary text-center ">{{$user->email}} </p>

                @endif
                @unless(Auth::user()->id == $user->id)
                    <div class="mt-10 flex flex-col w-1/5 mx-auto">

                        <p onclick="inviteOn()"
                           class="text-center bg-orange-500 text-white rounded-full font-medium py-1 my-1">Einladen</p>

                        <div id="invitePopUp" class="absolute hidden">
                            <div class="ml-16 bg-white border-2 rounded-lg border-secondary">
                                <div class="flex justify-end">
                                    <div class="flex">
                                        <p onclick="inviteOff()" class="mr-2">X</p>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-secondary font-semibold">Lade {{$user->username}} zu einem Projekt
                                        ein:</p>
                                </div>
                                <div class="flex flex-col">
                                    @foreach(Auth::user()->projects as $project)
                                        <div class="flex">
                                            @if($project->users()->where('role','=','creator')->get()->contains(Auth::user()->id))
                                                <div class="flex">
                                                    <p class="ml-3 mb-2 py-2">{{$project->title}}</p>
                                                </div>
                                                @if($project->users()->where('role','=','invited')->get()->contains($user->id))
                                                    <div class="flex flex-auto justify-end mr-4">
                                                        <a href="{{ route('profiles.invite', [$user, $project]) }}"
                                                           class=" ml-8 mb-2 py-2 px-1 text-center bg-secondary text-white rounded-lg font-medium">Anfrage
                                                            zurückziehen</a>
                                                    </div>
                                                @elseif($project->users()->where('role','=','member')->get()->contains($user->id))
                                                    <div class="flex flex-auto justify-end mr-4">
                                                        <p class="ml-8 mb-2 py-2 px-1 bg-muted rounded-lg">bereits
                                                            dabei</p>
                                                    </div>
                                                @else
                                                    <div class="flex flex-auto justify-end mr-4">
                                                        <a href="{{ route('profiles.invite', [$user, $project]) }}"
                                                           class="ml-8 mb-2 py-2 px-1 text-center bg-orange-500 text-white rounded-lg font-medium">einladen</a>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--                    <a href="#"--}}
                        {{--                       class="text-center bg-secondary text-white rounded-full font-medium py-1 my-1">Folgen</a>--}}
                    </div>
                @endunless

                <div class=" border-t border-secondary mt-8 w-1/2 lg:w-2/3  mx-auto">
                </div>

                <div class="flex flex-col mt-10 justify-center">
                    <div class="flex flex-col" >
                        <p class="text-secondary font-semibold text-center mb-4">Themen</p>
                        @foreach($user->tags as $tag)
                            @if($loop->iteration < 4)
                                <div class="flex my-1 w-3/4 lg:w-1/3 mx-auto justify-center">
                                    <a href="#" class="w-full md:max-w-xs break-words text-center text-sm text-secondary border-secondary border-2 px-6 ">{{ $tag->name }}</a>
                                </div>
                            @endif
                        @endforeach
                        <div class="hidden" id="extendTags">
                            @foreach($user->tags as $tag)
                                @if($loop->iteration > 3)
                                    <div class="flex my-1 w-3/4 lg:w-1/3 mx-auto justify-center">
                                        <a href="#" class="w-full md:max-w-xs break-words text-center text-sm text-secondary border-secondary border-2 px-6 ">{{ $tag->name }}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @foreach($user->tags as $tag)
                            @if($loop->iteration == 4)
                                <div class="mx-auto">
                                    <p onclick="extendsTagsOn()"
                                       class="block text-center text-sm cursor-pointer underline mt-2"
                                       id="extendsTagsOn">Mehr anzeigen</p>
                                    <p onclick="extendsTagsOff()"
                                       class="hidden text-center text-sm cursor-pointer underline mt-2  "
                                       id="extendsTagsOff">Weniger anzeigen</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="flex flex-col mt-6">
                        <p class="text-secondary font-semibold mb-4 text-center">Skills</p>
                        @foreach($user->skills as $skill)
                            @if($loop->iteration < 4)
                                <div class="flex w-3/4 lg:w-1/3 my-1 mx-auto">
                                    <a href="#"class="w-full md:max-w-xs break-words text-center text-sm bg-secondary rounded-lg text-primary uppercase px-6 py-1">{{$skill->name}}</a>
                                </div>
                            @endif
                        @endforeach
                        <div class="hidden" id="extendSkills">
                            @foreach($user->skills as $skill)
                                @if($loop->iteration > 3)
                                    <div class="flex my-1 w-3/4 lg:w-1/3 mx-auto">
                                        <a href="#"class="w-full md:max-w-xs break-words text-center text-sm bg-secondary rounded-lg text-primary uppercase px-6 py-1">{{$skill->name}}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @foreach($user->tags as $tag)
                            @if($loop->iteration == 4)
                                <div class="mx-auto">
                                    <p onclick="extendsSkillsOn()"
                                       class="block text-center text-sm cursor-pointer underline mt-2  "
                                       id="extendsSkillsOn">Mehr anzeigen</p>
                                    <p onclick="extendsSkillsOff()"
                                       class="hidden text-center text-sm cursor-pointer underline mt-2 "
                                       id="extendsSkillsOff">Weniger anzeigen</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="md:w-2/3">
                <div class="flex justify-center flex-col">
                    <div class="text-secondary mx-6 mt-12">
                        <p class="text-secondary text-center md:text-left text-lg">Über mich</p>
                        <p class="mt-6 w-full text-center md:text-left text-secondary ">{{ $user -> selfdescription}}</p>
                    </div>
                </div>

                <div class=" border-t border-secondary mt-8 w-1/2 lg:w-full mx-auto">
                </div>

                <div class="flex flex-col mx-6">
                    <p class="text-secondary text-center lg:text-left font-semibold text-lg mt-8">Projekte</p>
                    <div class="flex flex-col lg:flex-row mt-2 flex-wrap ">
                        @foreach($user->projects as $project)
                            <div class="flex w-10/12 lg:w-1/4 mx-auto lg:mx-4 mt-6 flex-col">
                                <div>
                                    <img src="/uploads/project/default.jpg" alt="img" class="w-full">
                                </div>
                                <p class="text-center mt-4">{{ $project->title }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
        @endsection()

        @section('webpage.scripts')
            <script>
                function inviteOn() {
                    var element = document.getElementById("invitePopUp");
                    element.classList.remove("hidden");
                    element.classList.add("block");
                }

                function inviteOff() {
                    var element = document.getElementById("invitePopUp");
                    element.classList.add("hidden");
                    element.classList.remove("block");
                }

                function extendsSkillsOn() {
                    var element = document.getElementById("extendSkills");
                    var open = document.getElementById("extendsSkillsOn");
                    var close = document.getElementById("extendsSkillsOff");
                    element.classList.remove("hidden");
                    element.classList.add("block");
                    open.classList.remove("block");
                    open.classList.add("hidden");
                    close.classList.remove("hidden");
                    close.classList.add("block");
                }

                function extendsSkillsOff() {
                    var element = document.getElementById("extendSkills");
                    var open = document.getElementById("extendsSkillsOn");
                    var close = document.getElementById("extendsSkillsOff");
                    element.classList.add("hidden");
                    element.classList.remove("block");
                    close.classList.remove("block");
                    close.classList.add("hidden");
                    open.classList.remove("hidden");
                    open.classList.add("block");
                }

                function extendsTagsOn() {
                    var element = document.getElementById("extendTags");
                    var open = document.getElementById("extendsTagsOn");
                    var close = document.getElementById("extendsTagsOff");
                    element.classList.remove("hidden");
                    element.classList.add("block");
                    open.classList.remove("block");
                    open.classList.add("hidden");
                    close.classList.remove("hidden");
                    close.classList.add("block");
                }

                function extendsTagsOff() {
                    var element = document.getElementById("extendTags");
                    var open = document.getElementById("extendsTagsOn");
                    var close = document.getElementById("extendsTagsOff");
                    element.classList.add("hidden");
                    element.classList.remove("block");
                    close.classList.remove("block");
                    close.classList.add("hidden");
                    open.classList.remove("hidden");
                    open.classList.add("block");
                }
            </script>
@endsection
