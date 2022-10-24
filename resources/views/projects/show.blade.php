<x-app-layout>
    <p>{{$project}}</p>
    <p>{{$user = User::find($project->user_id)}}</p>

</x-app-layout>