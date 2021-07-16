export var loadModel = function(){
    var model = document.getElementsByClassName("model");
    var close = document.getElementsByClassName("close_model");
    var trigger = document.getElementsByClassName("trigger_element");
    console.log(close);
    for(let i=0; i<trigger.length;i++){
        trigger[i].addEventListener("click", function(){
            model[i].classList.toggle("visible");
            console.log("closing now");
        })
        close[i].addEventListener("click", function(){
            model[i].classList.toggle("visible");
            console.log("closing now");
        })
    }
    
}