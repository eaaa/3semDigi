<?php
// koden til Brors navnespil
    include "buttons.php";
?>
var list = document.getElementById("article_list"),
covers = document.getElementsByClassName("cover"),
uncovers = document.getElementsByClassName("uncover"),
titleH1 = document.getElementById("titleH1"),
buttonShuffle = document.getElementById("shuffle"),
buttonInverse = document.getElementById("doInverse"),
buttonReveal = document.getElementById("nocover");
buttonHide = document.getElementById("docover");

function shuffle(items)
{
    var cached = items, i = cached.length, rand;
    while(i--)
    {
        rand = Math.floor(i * Math.random());
        cached[i] = cached[rand];
    }
    return cached;
}
function shuffleArticles()
{
    var nodes = list.children, i = 0;
    nodes = Array.prototype.slice.call(nodes);
    nodes = shuffle(nodes);
    while(i < nodes.length)
    {
        list.appendChild(nodes[i]);
        i++;
    }
}
function swop(me){
    if (me.className=="show") {
        me.className="hide";
    } else {
        me.className="show";
    }
}
function swop2(me){
    if (me.className=="cover") {
        me.className="uncover";
    } else {
        me.className="cover";
    }
  //  event.stopPropagation();
}
function removeCovers()
{
    var nodes = covers, i = 0;
    nodes = Array.prototype.slice.call(nodes);
    while(i < nodes.length)
    {
        swop2(nodes[i]);
        i++;
    }
}
function addCovers()
{
    var nodes=uncovers ,   i = 0;
    nodes = Array.prototype.slice.call(nodes);
   // alert(nodes.length);
    while(i < nodes.length)
    {
        swop2(nodes[i]);
        i++;
    }
}
function invertDisplay()  {
	// swop the class of all articles
	var nodes = list.children, i = 0;
    nodes = Array.prototype.slice.call(nodes);
    while(i < nodes.length) 
    {
        swop(nodes[i]);
        i++;
	}
	// Change the text of title and Button
	if (titleH1.innerHTML=="<?php echo $absent ; ?>"){
		titleH1.innerHTML="<?php echo $present ; ?>";
		buttonInverse.innerHTML=" <?php echo $absent ; ?>" ;
	} else {
		titleH1.innerHTML="<?php echo $absent ; ?>";
		buttonInverse.innerHTML=" <?php echo $present ; ?> " ;
	}
}
 
buttonShuffle.onclick = shuffleArticles;
buttonInverse.onclick = invertDisplay;
buttonReveal.onclick = removeCovers;
buttonHide.onclick = addCovers;
