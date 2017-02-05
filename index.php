<!DOCTYPE HTML>
<html lang="en">
<head>
<style>
.section{
    width:1000px;
    margin:0 auto;
}
.highlighted-team-members{
    text-align:center;
    margin:0 auto;
}

li{
    width:150px;
    height:150px;
    display:inline-block;
    position:relative;
}
.hover-content{
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    vertical-align: middle;
    opacity: 0;
    font: bold normal 16px/20px Arial, sans-serif;
    text-align: center;
    color: #fff;
    background: rgba(0, 0, 0, 0.75);
    -webkit-transition: opacity 150ms ease-out;
    -moz-transition: opacity 150ms ease-out;
    transition: opacity 150ms ease-out;
    background-size: cover;
    background-position: center center;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -o-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: translatez(0);
    transform: translatez(0);
}
li:hover{
    perspective: 600px;
    width: 150px;
    height: 150px;
    left: 0;
    top: 0px;
    z-index: 0;
    overflow: visible;
}
li:hover .hover-content{
    opacity:1;
}
.title{
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    font-size: .7em;
    line-height: 1em;
    color: #fff;
    padding: .3em 0;
    background:rgba(7,31,45,.7);
}
.title p{
    padding: 0;
    color: #fff;
    line-height: 1.4em;
    position: relative;
    margin:.4em 0;
    font-weight: normal;
}
</style>
</head>
<body>
   <ul class="section">
    <?php 
        //add team photos
        $url = 'employees.json';
        $content = file_get_contents($url,true);
        $json = json_decode($content,true);
        $employee = $json['employees'][1]['employee'];
        $count = count($employee);
        for($i = 0; $i < $count; $i++){
            $emp = $employee{$i};
            //get department
            $code = $json['employees'][0]['code'];
            if(is_numeric($emp['department'])){
                $dept = $code[$emp['department']];
            }else{
                $dept = $emp['department'];
            }
            $fixed = isset($emp['class']);
            ?>
            <!-- get the first image in array for default photo-->
            <li style="background: url(img/teamphotos/<?php echo $emp['image'][0]; ?>.jpg">
            <!-- second image in array for hover-->
            <div class="hover-content vcenter" style="background-image:url(img/teamphotos/<?php echo $emp['image'][1];?>.jpg)">
                    <div class="title">
                        <p><?php echo $emp['name'];?><br /><?php echo $dept;?></p>
                    </div>
                </div>
            </li>
        <?php  } 
    ?>
        
    </ul>
</body>
</html>


