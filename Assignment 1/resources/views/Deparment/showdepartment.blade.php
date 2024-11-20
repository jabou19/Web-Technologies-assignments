<html>
<head>  </head>
<body>
<div> <b>Department Information with ID :</b>{{$department->id}}</div>
<div class="success-message"><?php if (session()->has('updated'))
        echo session()->get('updated')?>
</div>
<div class="department">
    <ul>
        <li class="name">  Departments Name: {{$department->name}}</li>
        <li class="code">   Departments Code:{{$department->code}} </li>
        <li class="description">   Departments Description:{{$department->description}}  </li>
    </ul>
</div>
<div>
{{--edit --}}
    <a class="back" href="{{route("departments",[$department->id])}}"><button> <b>Back </b></button> </a>
<a class="edit" href="{{route("edit",[$department->id])}}"><button> <b> Edit</b></button> </a><br>
</div>
<form action="{{route("destroy",[$department->id])}}" method="POST">
    @method("DELETE")
    @csrf
    <input class="remove" type="submit" value="DELETE">

</form>


<div class="course">
<?php echo 'Courses Information: ' ?>
    <ul>
     {{--  <?php $course=\App\Models\Course::find($department->id)?>--}}
     {{--   <?php $department=\App\Models\Department::all() ?>--}}
 @foreach ($department->courses as $c)
   <li >Course's ID is:  {{$c->id}}</li>
        <li>  Course's Name: {{$c->name}}</li>
        <li>  Course's Code: {{$c->code}} </li>
        <li>   Course's ECTS: {{$c->ects}} </li>
    <li><a  href="{{route("show.course",[$c->id])}}" class="show"><b>Show course</b></a></li>
 @endforeach
</ul>
</div>
</body>
</html>
