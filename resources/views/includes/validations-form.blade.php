@if($errors->any()) <!-- se tiver algum erro no form, "$errors->any()" irá informar -->
    <ul class="errors">
        @foreach ($errors ->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif