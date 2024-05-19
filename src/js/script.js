/* 
Individual Project (UAS Lab)
Frederick Armando Jerusha - 222203085
Script.js
 */


let musicArtist = musicPlayer.querySelector('.artist');
let musicPlayer = document.querySelector('.music-player');
let music = musicPlayer.querySelector('.music');
let musicAlbum = musicPlayer.querySelector('.album');
let musicName = musicPlayer.querySelector('.name');
let playBtn = document.querySelectorAll('.playlist .box-container .box .play');

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