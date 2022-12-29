function like(){
    var like = document.getElementById("like");
    like.src = "assests/heart.png";
}
function hide(){
    var hide = document.getElementById("tweetbtn");
    if(hide.innerHTML == "Hide All Tweets"){
        hide.innerHTML = "Show All Tweets"
    }
    else{
        hide.innerHTML = "Hide All Tweets"
    }
}