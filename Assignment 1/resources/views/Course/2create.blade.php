<html>
<body>
<h1>Create a Course</h1>
{{--ekstra button --}}
<div>
<a class="back" href="{{route("courses")}}"><button> <b> Back</b></button> </a><br>
</div>
<form class="store" action="{{route("store.course")}}"  method="post">
    <?php echo csrf_field(); ?>
    <label for="name"> <b> Name</b> </label><br>
    <input type="text" id="name" name="name" placeholder="name"><br><br>
    <label for="code"><b> Code</b> </label><br>
    <input type="text" id="code" name="code" placeholder="code"><br><br>
        <label for="e"><b> ECTS</b> </label><br>
        <input id="e" type="text" name="ects" placeholder="ects"><br><br>
        <label for="department"><b> Department </b> </label><br>
        <select id="department" name="department" >
           {{$department=\App\Models\Department::all()}}
            @foreach ($department as $d )
            <option value="{{$d->id}}">{{$d->name}}</option>
                @endforeach
        </select><br><br>

    <label for="description"> <b> Description</b> </label><br>
        <input type="text" id="description" name="description" placeholder="Description"><br><br>
    <button class="submit" type="submit"><b> Submit</b></button>
</form>
</body>
</html>
