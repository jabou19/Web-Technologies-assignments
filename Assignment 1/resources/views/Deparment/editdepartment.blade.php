<html>
<body>
<div>
<a class="back" href=" {{route("show",[$department->id])}}"><button><b> Back</b></button> </a><br>
</div>

<form class="edit" action="{{route("update",[$department->id])}}"  method="post">
    @method('PUT')
    <?php echo csrf_field(); ?>
        <label for="n"> <b> Name</b> </label><br>
        <input id="n" type="text" name='name' placeholder="Name" value="{{$department->name}}"><br><br>
        <label for="c"><b> Code</b> </label><br>
        <input id="c"   type="text" name='code' placeholder="Code" value="{{$department->code}}" ><br><br>
        <label for="d"> <b> Description</b> </label><br>
        <input id="d"  name="description" placeholder="Description" value="{{$department->description}}" ><br><br>
       <button class="submit" type="submit"> <b>Submit</b></button>

</form>
</body>
</html>
