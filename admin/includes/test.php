

<style>
	ul{
  display: none;
  margin: 0;
  padding: 0;
  background-color: pink;
  position: absolute;
  width: 75px;
}

.page{
  display:none;
}

#drop:hover > ul{
  display: block;
}

#drop{
  background-color: lightgreen;
  width: 75px;
  text-align:center;
}

li{
  list-style: none;
  text-align: center;
}

li:hover{
  background-color: lightblue;
}
</style>


<div id="drop">
 <span><input type="text" name="id"></span>
  <ul>
    <li value="1">1</li>
    <li value="2">2</li>
    <li value="3">3</li>  
  </ul>
</div>

<!-- <div id="Page1" class="page" style="">
  Content of page 1
</div>
<div id="Page2" class="page" style="display:none">
  Content of page 2
</div>
<div id="Page3" class="page" style="display:none">
  Content of page 3
</div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$("span").html("city");
// $("#Page1").show();

$("li").on('click', function() {
  var value = $(this).val();
  if (value) {
    // $(".page").hide();
    // $("#Page" + value).show();
    $("span").html("city" + value);
  }
});
</script>