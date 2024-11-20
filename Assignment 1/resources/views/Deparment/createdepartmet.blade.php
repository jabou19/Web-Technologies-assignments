
<html>
<body>
<h1>Create a Department</h1>
{{--ekstra button --}}
<div>
<a class="back" href="{{route("departments")}}"><button> <b>Back </b></button> </a><br>
</div>
{{--@foreach($departments as $d)--}}
{{--<div class="new"> <?php echo $d->name ?></div>--}}
{{--@endforeach--}}
<form class="store" action="{{route("store")}}"  method="post">
    <?php echo csrf_field(); ?>
    <label> <b> Name</b> </label><br>
        <input type="text" name="name" placeholder="name"><br><br>
        <label><b> Code</b> </label><br>
        <input type="text" name="code" placeholder="code"><br><br>
        <label> <b> Description</b> </label><br>
        <input type="text" name="description" placeholder="Description"><br><br>
{{--        <textarea type="text" name="description" placeholder="Description"></textarea><br><br>--}}
        <button class="submit" type="submit"> <b>Submit </b> </button>
</form>
</body>
</html>


