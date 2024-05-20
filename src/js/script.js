/* 
Individual Project (UAS Lab)
Frederick Armando Jerusha - 222203085
Script.js
 */

let playBtn = document.querySelectorAll('.playlist .box-container .box .play');
let musicPlayer = document.querySelector('.music-player');
let musicAlbum = musicPlayer.querySelector('.album');
let musicName = musicPlayer.querySelector('.name');
let musicArtist = musicPlayer.querySelector('.artist');
let music = musicPlayer.querySelector('.music');

playBtn.forEach(play =>{

   play.onclick = () =>{
      let src = play.getAttribute('data-src');
      let box = play.parentElement.parentElement;
      let name = box.querySelector('.name');
      let album = box.querySelector('.album');
      let artist = box.querySelector('.artist');

      musicAlbum.src = album.src;
      musicName.innerHTML = name.innerHTML;
      musicArtist.innerHTML = artist.innerHTML;
      music.src = src;

      musicPlayer.classList.add('active');

      music.play();

   }

});

document.querySelector('#close').onclick = () =>{
   musicPlayer.classList.remove('active');
   music.pause();
}


const tabs = document.querySelectorAll('.navtab');
const underline = document.querySelector('.underline');

function updateUnderline() {
    const activeTab = document.querySelector('.navtab.active');
    underline.style.width = `${activeTab.offsetWidth}px`;
    underline.style.left = `${activeTab.offsetLeft}px`;
}

function setActiveTab(tabId) {
    tabs.forEach(tab => tab.classList.remove('active'));
    const activeTab = document.getElementById(tabId);
    if (activeTab) {
        activeTab.classList.add('active');
    }
}

const currentPath = window.location.pathname;
const pathParts = currentPath.split('/');
const currentFile = pathParts[pathParts.length - 1];

let currentTabId;
switch (currentFile) {
    case 'index.php':
        currentTabId = 'home-tab';
        break;
    case 'list.php':
        currentTabId = 'list-tab';
        break;
    case 'about.php':
        currentTabId = 'about-tab';
        break;
    case 'upload.php':
        currentTabId = 'upload-tab';
        break;
    default:
        currentTabId = 'home-tab';
}

setActiveTab(currentTabId);

tabs.forEach(tab => {
    const tabLink = tab.querySelector('a');
    tabLink.addEventListener('click', () => {
        setActiveTab(tab.id);
        updateUnderline();
    });
});

window.addEventListener('resize', updateUnderline);
updateUnderline();

