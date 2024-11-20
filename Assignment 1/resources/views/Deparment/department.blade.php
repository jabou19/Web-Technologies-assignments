<html>
<head>
    <title> Departments</title>
</head>
<body>
<h1> Department</h1>
<div >
<a  class="back" href="{{route('home')}}"><button><b> Back</b></button> </a><br>
</div>
<div class=" success-message">
    <?php if (session()->has('create'))
        echo session()->get('create')?>
</div>
<div class="success-message ">
    <?php if (session()->has('remove'))
        echo session()->get('remove')?>
</div>

<div class="department">
<table style="width: 75%">
    @foreach($department as $d)
    <tr>

        <th><a class="show" href="{{route("show",[$d->id])}}" >Show</a>   </th>

        <th>Name: <td>{{$d->name}}</td></th>
        <th>Code: <td>{{$d->code}}</td></th>
{{--        <th>Description: <td>{{$d->description}}</td></th>--}}
        <th>Number of courses: <td>{{$d->courses()->count() }}</td></th>
{{--        <?php echo 'Number of courses:             ' ?> <?php echo $b->course->count() ?>--}}
    </tr>
{{--         <li > <a class="show" href="{{route('show',[$d->id])}}" >Show </a> {{$d->name}}</li>--}}
        {{--  <a class="new" href="<?php echo route('show',[$d->id]) ?> "><button>show</button> </a>{{$d->name}}--}}

    @endforeach
</table>
</div>
<div >
 <a class="new" href="{{route("create")}}"><button> <b> Create</b></button> </a>

</div>
</body>
</html>
