<!DOCTYPE HTML>

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Eventsiswa v1</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <style>
        body{
            margin:0px;
            overflow: hidden;
        }
        #topbar{
            background-color: rgba(107, 33, 50, 1);
            height: 10%;
            width: 100%;
            margin:0px;
        }
        #addnew{
            background-color: rgba(0,0,0,0.5);
            border-radius: 5px;
            min-width: 10%;
            border: 0px solid black;
            outline: none;
            cursor:pointer;
            padding: 10px 20px 10px 20px;
            margin:5px;
            font-family: "Roboto", sans-serif;
            font-size: 1.1em;
            color: white;
        }
        #addnew:hover{
            background-color: rgba(0,0,0,1);
            color: white;
        }

        #entryctn{
            text-align: center;
            /* background-color: red; */
            overflow-y: scroll;
            overflow-x: hidden;
            max-width:100%;
            padding: 0px;
            max-height: 90vh;
        }

        ul{
            padding: 0px 0.4vw 0px 0.4vw;
        }

        .entries li{
            background-color: rgba(147, 73, 90, 1);
            font-family: "Roboto", sans-serif;
            height:230px;
            width: 400px;
            border-radius: 15px;
            margin: 0.4vw 0.4vw 0.4vw 0.4vw;
            padding: 15px 5px 15px 5px;
            color: white;
            transition: all .2s ease-in-out;
            display: inline-block;
            cursor: pointer;
            overflow:hidden;
        }

        .entries li:hover{
            background-color: rgba(107, 33, 50, 1);
        }

        .entries img{
            max-width: 400px;
            max-height: 400px;
        }

        #title{
            background-color: black;
        }

        /* SCROLLBAR */
        /* width */
        ::-webkit-scrollbar {
          width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
          /* box-shadow: inset 0 0 5px grey; */
          border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: black;
          border-radius: 10px;
        }
        /* SCROLLBAR END */

        #desc{
            text-align: justify;
            text-justify: inter-word;
        }
    </style>
</head>
<body>

    <div id="topbar"><button onclick="document.location='advertiseform.html'" id="addnew">Advertise Event</button></div>

    <?php
    $servername = "johnny.heliohost.org";
    $username = "evsiswa_admin";
    $password = "dcba1235";
    $dbname = "evsiswa_maindb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM entry";
    $query = $conn->query($sql);
    ?>


    <div id="entryctn">
        <ul class="entries">

            <?php
            while ($temp = mysqli_fetch_assoc($query)) {
                echo '<li onclick="showContents(this)">'.$temp['ev_title'].'<br>
                    <p><img src="'.$temp['ev_imgpath'].'"></img>
                    <br><div id="title">DESCRIPTION</div><div id="desc">'.$temp['ev_desc'].'</div>
                    <br><div id="title">MYCAT LEVEL</div>'.$temp['level_id'].'<br>
                    <br><div id="title">START DATE</div>'.$temp['ev_date'].'<br>
                    <br><div id="title">VENUE</div>'.$temp['ev_venue'].'<br>
                    <br><div id="title">CONTACT</div>'.$temp['ev_contact'].'<br>';
            };
            ?>

        </ul>
    </div>

    <script>
    function showContents(ele){
        if(ele.style.height!="600px"){
            ele.style.height = "600px";
            ele.style.overflowY = "scroll";
        } else{
            ele.style.height = "230px";
            ele.style.overflowY = "hidden";
            ele.scrollTop = 0;
        }

    }
    </script>

</body>
