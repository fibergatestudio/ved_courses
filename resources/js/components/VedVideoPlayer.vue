<template>
  <div>
    <div class="player_wrapper">
      <video
        class="video-collection_iframe"
        controls="controls"
        poster="video/duel.jpg"
      >
        <source
          src="video/duel.mp4"
          type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'
        />
        Тег video не поддерживается вашим браузером.
        <a href="video/duel.mp4">Скачайте видео</a>.
      </video>
    </div>
  </div>
</template>

<script>
export default {
    props: ['videoNames', 'videoPaths'],

    mounted() {
        
    }
};
</script>

<style>
/* Styles */
</style>
