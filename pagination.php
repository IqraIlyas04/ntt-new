<button class="paging_button li">next</button>
<?php
$link = mysqli_connect("localhost", "root", "", "ntt");
$per_page = 4;
$result = "SELECT * FROM destination_offers";
$sql=mysqli_query($link,$result);
$count =  $sql->num_rows;
$pages = ceil($count/$per_page);

    //Show page links
    for($i=1; $i<=$pages; $i++)
    {
        echo '<li  class="pagenum" id="'.$i.'">'.$i.'</li>';
    }
?>
<script>
	$("#paging_button li").click(function(){
        //show the loading bar
        showLoader();

        $("#paging_button li").css({'background-color' : ''});
        $(this).css({'background-color' : '#ccc'});

        $("#contentt").load("data.php?page=" + this.id, hideLoader);
    });
</script>