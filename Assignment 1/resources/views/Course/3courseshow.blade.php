<html>
<head>  </head>
<body>
<div> <b>Course Information with ID :</b>  {{$course->id}} </div>
<div class="success-message"><?php if (session()->has('updated a course'))
        echo session()->get('updated a course')?>
</div>
<div class="course">
    <ul>
        <li>  Course's Name: {{$course->name}}</li>
        <li >  Course's Code: {{$course->code}} </li>
        <li >   Course's ECTS: {{$course->ects}} </li>
        <li >  Course's Description:  {{$course->description}}  </li>
{{--        @foreach($course as $c)--}}
        <li> Department:  <?php  $department = \App\Models\Department::find($course->department_id); echo $department->name ?><br>
            <a href="{{route("show",[$department->id])}}" class="show" value="{{$department->name}}">{{$department->name}}</a>
        </li>
{{--        @endforeach--}}

    </ul>
</div>
<div>
    <a class="back" href="{{route("courses",[$course->id])}}"><button> <b>Back </b></button> </a>
    <a class="edit" href="{{route("edit.course",[$course->id])}}"><button><b>Edit</b> </button> </a>

    <form action="{{route("destroy.course",[$course->id])}}" method="post">
        @method("DELETE")
        @csrf
        <input class="remove" type="submit" value="DELETE">
    </form>
</div>
</body>
</html>
