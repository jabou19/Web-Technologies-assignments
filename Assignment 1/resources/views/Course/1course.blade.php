<html>
<head><title>Courses </title></head>
<body>
<h1>Courses</h1>
<div>
<a class="back" href="{{route('home')}}"><button> <b style="color: red"> Back</b></button> </a>
</div>
<div class="success-message"><?php if (session()->has('create a course'))
        echo session()->get('create a course')?>
</div>
<div class="success-message"><?php if (session()->has('remove a course'))
        echo session()->get('remove a course')?>
</div>

<div class="course">
    <table style="width: 75%">

            <tr>
                @foreach($course as $c)
                <th><a class="show" href="{{route("show.course",[$c->id])}}" >Show </a></th>
                <th>Name: <td>{{$c->name}}</td></th>
                <th>Code: <td>{{$c->code}}</td></th>
                <th>ECTS: <td>{{$c->ects}}</td></th>

                <th>Department: <td> <?php  $department = \App\Models\Department::find($c->department_id) ?>
            <a href="{{route('show',[$department->id])}}" class="show">{{$department->name}}</a></td></th>
                    @endforeach

{{--            <th> Department: <td><?php  $department = \App\Models\Department::find($c->department_id) ?>--}}
{{--            <a href="/departments/<?php echo $department->id?>" class=" <?php echo $department->name?>"> <?php echo $department->name?> </a></td></th>--}}

            </tr>
    </table>
</div>

<div>
    <a class="new" href="{{route("create.course")}}"><button> <b> Create</b></button> </a>
</div>
</body>
</html>
