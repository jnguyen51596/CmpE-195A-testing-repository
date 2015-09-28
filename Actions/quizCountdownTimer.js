function startTimer(date, display) {
    var a=new Date(date);
    var b =Date.now(); 
    var totalseconds =(a- b)/1000; 
    var duration;
    if(totalseconds<0)
    {
        duration=0;
    }
    else
    {
        var rounded=Math.round(totalseconds);
        duration=rounded;
    }
    var timer = duration,days, hours, minutes, seconds;
    setInterval(function () {
        days=parseInt(timer/86400,10);
        hours=parseInt(timer/3600,10);
        minutes = parseInt(timer / 60, 10);        
        seconds = parseInt(timer % 60, 10);
        
        var temp1=hours-(days*24);
        var temp2=minutes-(hours*60);
        hours=temp1;
        minutes=temp2;
        
        days = days < 10 ? "0" + days : days;
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        
        display.textContent =days+" Day(s) "+hours+":"+ minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}


