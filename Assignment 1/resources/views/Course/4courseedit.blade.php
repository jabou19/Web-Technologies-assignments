<html>
<body>
<div>
<a class="back" href=" {{route("show.course",[$course->id])}}"><button><b>Back </b> </button> </a><br>
</div>

<form class="edit" action="{{route("update.course",[$course->id])}}"  method="post">
    @method('PUT')
    <?php echo csrf_field(); ?>
    <label for="name"> <b> Name</b> </label><br>
    <input id="name" type="text" name="name" placeholder="name" value="{{$course->name}}"><br><br>
    <label for="code"><b> Code</b> </label><br>
    <input id="code"  type="text" name="code" placeholder="code" value="{{$course->code}}" ><br><br>
    <label for="description"> <b> Description</b> </label><br>
    <input id="description"  name="description" placeholder="description" value="{{$course->description}}" ><br><br>
        <label for="ects"> <b> ECTS</b> </label><br>
        <input id="ects"  name="ects" placeholder="ects" value="{{$course->ects}}" ><br><br>
        <label for="department"><b> Department </b> </label><br>
        <select id="department" name="department" placeholder="department" >
            {{$department=\App\Models\Department::all()}}
            @foreach ($department as $d )
                <option  value="{{$d->id}}"> {{$d->name}}</option>
            @endforeach
        </select><br><br>

    <button class="submit" type="submit"><b>Submit </b> </button>

</form>
</body>

</html>
