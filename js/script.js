var list = document.getElementById("article_list"),
titleH1 = document.getElementById("titleH1"),
buttonShuffle = document.getElementById("shuffle"),
buttonInverse = document.getElementById("doInverse");

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
		me.className="show"
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
	if (titleH1.innerHTML=="Absent"){
		titleH1.innerHTML="Present";
		buttonInverse.innerHTML=" Who are Absent ? "
	} else {
		titleH1.innerHTML="Absent";
		buttonInverse.innerHTML=" Who are Present ? "
	}
}
 
buttonShuffle.onclick = shuffleArticles;
buttonInverse.onclick = invertDisplay;
