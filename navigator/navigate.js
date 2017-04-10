    window.onload=function(){

        // initialization ---------------------------------------------------------------
        var nav     =   navigator.geolocation;
        var watcher =   false;  
        var geoLoc  =   {};
        var xhr     =   new XMLHttpRequest();
        var urlReq  =   "https://maps.googleapis.com/maps/api/geocode/json?latlng=";
        var mapOptions= {
            zoom:18,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map     =   false;
        var marker  =   false;




        // making a request for geo location --------------------------------------------
        if(nav){
            watcher=nav.watchPosition(success_callback,error_callback,{
                    enableHighAccuracy:true,
                    timeout:5*100*60,
                    maximumAge:8*1000});
        }

        // success callback --------------------------------------------------------------
        function success_callback(pos){
            geoLoc.latitude=pos.coords.latitude;
            geoLoc.longitude=pos.coords.longitude;
            geoLoc.accuracy=pos.coords.accuracy;
            geoLoc.heading=pos.coords.heading;
            display();
        }
        // error call back ----------------------------------------------------------------
        function error_callback(err){
            if(err){
                alert("please try again "+err.code+" "+ err.message );
                nav.clearWatch(watcher);
            }
        }

        function mark(){
            marker = new google.maps.Marker({
            position : new google.maps.LatLng(geoLoc.latitude,geoLoc.longitude),
            map      : map,
            title    : "you, are here " });


        }

        function display(){
            var  makeurl=urlReq+geoLoc.latitude+","+geoLoc.longitude;
            xhr.open("GET",makeurl,true);
            xhr.send();

            xhr.onload=function(){
                var data=JSON.parse(xhr.responseText);
                if(data.status=="OK"){
                    mapOptions.center=new google.maps.LatLng(geoLoc.latitude,geoLoc.longitude);
                    map=new google.maps.Map(document.getElementById('map'),mapOptions);
                    mark();   
                    alert(data.results[0].formatted_address);
                }else{
                    alert("SORRY!! Not able to fetch location");
                }
        };
        }

}

