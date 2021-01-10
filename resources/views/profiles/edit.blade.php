@extends('layouts.app')
@section('content')
    <div id="wrapper">
        <div id="page" class="mx-auto mt-4">
            <form method="POST" action="{{route('profiles.update', $user)}}">
                @csrf
                @method('PUT')
                <div class="flex justify-center lg:justify-end lg:mr-6 mb-6">
                    <button class="bg-secondary text-white px-6 py-2 text-xs font-semibold rounded-lg" type="submit">Speichern</button>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="flex flex-col md:w-1/2 mx-6 mt-10 " id="image-button">
                        <div class="flex flex-col justify-center">
                            <div class="w-2/5 mx-auto lg:mx-0">
                                <img src="{{ $user->getAvatar() }}" alt="img" class="rounded-full border md:w-2/5 lg:w-1/2 mx-auto ">
                            </div>
                            <div class="flex mx-auto rounded-lg bg-muted mt-4 mb-1 py-1 px-3">
                                <p class="text-lg">{{ $user->username }}</p>
                            </div>
                            <div class="">
                                <label class="label" for="email">E-Mail</label>
                                <div class="control">
                                    <input
                                        class="w-full md:w-3/4 py-1 px-2 border-2 border-secondary rounded {{ $errors->has('firstName') ? 'is-danger' : '' }}"
                                        name="email"
                                        id="email"
                                        value="{{ $errors->isEmpty() ? $user->email : old('email') }}"
                                    >

                                    @if($errors->has('email'))
                                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <p class="text-center accordion mt-3 mb-1 cursor-pointer">Profilbild auswählen</p>
                        <div class="panel bg-muted rounded-lg">
                            <select  class="image-picker show-html " name="avatar" id="avatar">
                                <option  data-img-src="/uploads/user/profil1.png"  value="1" {{ $user->avatar == '/uploads/user/profil1.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil2.png"  value="2" {{ $user->avatar == '/uploads/user/profil2.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil3.png"  value="3" {{ $user->avatar == '/uploads/user/profil3.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil4.png"  value="4" {{ $user->avatar == '/uploads/user/profil4.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil5.png"  value="5" {{ $user->avatar == '/uploads/user/profil5.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil6.png"  value="6" {{ $user->avatar == '/uploads/user/profil6.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil7.png"  value="7" {{ $user->avatar == '/uploads/user/profil7.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil8.png"  value="8" {{ $user->avatar == '/uploads/user/profil8.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil9.png"  value="9" {{ $user->avatar == '/uploads/user/profil9.png' ? 'selected' : ''}}> </option>
                                <option  data-img-src="/uploads/user/profil10.png"  value="10" {{ $user->avatar == '/uploads/user/profil10.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil11.png"  value="11" {{ $user->avatar == '/uploads/user/profil11.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil12.png"  value="12" {{ $user->avatar == '/uploads/user/profil12.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil13.png"  value="13" {{ $user->avatar == '/uploads/user/profil13.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil14.png"  value="14" {{ $user->avatar == '/uploads/user/profil14.png' ? 'selected' : ''}}></option>
                                <option  data-img-src="/uploads/user/profil15.png"  value="15" {{ $user->avatar == '/uploads/user/profil15.png' ? 'selected' : ''}}></option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col md:w-1/2 mx-6">
                        <div class="mt-4">
                            <label class="label" for="firstName">Vorname</label>
                            <div class="control">
                                <input
                                    class="w-full md:w-3/4 py-1 px-2 border-2 border-secondary rounded {{ $errors->has('firstName') ? 'is-danger' : '' }}"
                                    name="firstName"
                                    id="firstName"
                                    value="{{ $errors->isEmpty() ? $user->firstName : old('firstName') }}"
                                >

                                @if($errors->has('firstName'))
                                    <p class="help is-danger">{{ $errors->first('firstName') }}</p>
                                @endif

                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="label" for="lastName">Nachname</label>
                            <div class="control">
                                <input
                                    class="w-full md:w-3/4 py-1 px-2 border-2 border-secondary rounded {{ $errors->has('lastName') ? 'is-danger' : '' }}"
                                    name="lastName"
                                    id="lastName"
                                    value="{{ $errors->isEmpty() ? $user->lastName : old('lastName') }}"
                                >

                                @if($errors->has('lastName'))
                                    <p class="help is-danger">{{ $errors->first('lastName') }}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row mb-10">
                    <div class="mt-4 md:w-1/2">
                        <label class="label ml-6" for="selfdescription">Über mich</label>

                        <div class="control mx-6">
                        <textarea class="w-full py-1 px-2 border-2 border-secondary rounded @error('selfdescription') is-danger @enderror"
                                  name="selfdescription"
                                  id="selfdescription"
                                  style="height: max-content"
                        >{{ $errors->isEmpty() ? $user->selfdescription : old('selfdescription') }}</textarea>

                            @error('selfdescription')
                            <p class="help is-danger">{{ $errors->first('selfdescription') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mx-6 md:w-1/4">
                        <label class="text-secondary text-lg font-semibold" for="tags">Themen</label>
                        <div class="h-32 border-2 border-secondary rounded flex flex-col overflow-y-scroll">
                            @foreach($tags as $tag)
                                @if($user->tags()->where('tag_id','=',$tag->id)->exists())
                                    <div>
                                        <input type="checkbox" id="{{'tag' . $tag->id}}" name="tags[]" value="{{$tag->id}}" checked class="ml-1">
                                        <label for="{{'tag' . $tag->id}}"> {{$tag->name}} </label>
                                    </div>
                                @else
                                    <div>
                                        <input type="checkbox" id="{{'tag' . $tag->id}}" name="tags[]" value="{{$tag->id}}" class="ml-1">
                                        <label for="{{'tag' . $tag->id}}"> {{$tag->name}} </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4 mx-6 md:w-1/4">
                        <label class="text-secondary text-lg font-semibold" for="skills">Skills</label>
                        <div class="h-32 border-2 border-secondary rounded flex flex-col overflow-y-scroll">
                            @foreach($skills as $skill)
                                @if($user->skills()->where('skill_id','=',$skill->id)->exists())
                                    <div>
                                        <input type="checkbox" id="{{'skill' . $skill->id}}" name="skills[]" value="{{$skill->id}}" checked class="ml-1">
                                        <label for="{{'skill' . $skill->id}}"> {{$skill->name}} </label>
                                    </div>
                                @else
                                    <div>
                                        <input type="checkbox" id="{{'skill' . $skill->id}}" name="skills[]" value="{{$skill->id}}" class="ml-1">
                                        <label for="{{'skill' . $skill->id}}"> {{$skill->name}} </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
            <div class="h-10">

            </div>
        </div>
    </div>
@endsection
