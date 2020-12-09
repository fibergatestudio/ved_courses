<template>
<div>
    <div class="programs-item_video">{{ videoNames.length }} відео</div>
    <table class="video-collection_table hidden-menu">
      <tbody>
        <tr
          v-for="(name, index) in videoNames"
          :key="name"
          class="video-collection_string hidden-menu_string"
        >
          <td class="hidden-menu_column">
            <span v-if="videoLengthes">{{ videoLengthes[index] }} хв.</span>
          </td>
          <td class="hidden-menu_column">
            <div class="hidden-menu_dot"></div>
          </td>
          <td class="hidden-menu_column">
            {{ name }}
            (
            <a
              v-on:click.prevent="showVideo(assetPath + '/' + videoPaths[index], videoNames[index])"
              v-if="videoPaths && videoPaths[index]"
              href="#"
              >
             Відеофайл
            </a>
            <a
              v-on:click.prevent="showYoutube(videoLinks[index], videoNames[index])"
              v-if="videoLinks && videoLinks[index]"
              href="#"
              >
             Посилання
            </a>
            )
          </td>
        </tr>
      </tbody>
    </table>
    <div class="string-text text-center mb-1">
        {{ title }}
    </div>
    <div v-if="!youtube" class="player_wrapper">
      <video :key="video" class="video-collection_iframe" controls>
          <source
            :src="video"
            type="video/mp4"
            >
        Тег video не підтримується вашим браузером.
        <a :href="video">Скачайте або відкрийте відео у новій вкладці.</a>.
      </video>
    </div>
    <div v-if="youtube" class="player_wrapper">
        <iframe :key="video" :src="video" class="video-collection_iframe" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            Ваш браузер не підтримує фрейми.
        </iframe>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    videoNames: {
      type: Array,
      required: true,
      default: [],
    },
    videoPaths: {
      type: Array,
      required: false,
      default: [],
    },
    videoLinks: {
      type: Array,
      required: false,
      default: [],
    },
    videoLengthes: {
      type: Array,
      required: false,
      default: [],
    },
    assetPath: {
      type: String,
      required: true,
      default: "/",
    },
  },

  data: function () {
    return {
      video: '',
      youtube: false,
      //show: false,
      title: '',
    }
  },

  mounted() {
      if (this.videoPaths[0]) {
          this.showVideo(this.assetPath + '/' + this.videoPaths[0], this.videoNames[0]);
      } else {
          this.showYoutube(this.videoLinks[0], this.videoNames[0]);
      }
  },
  methods: {
    showVideo (filePath, title) {
        this.video = filePath;
        this.youtube = false;
        this.title = title;
    },
    showYoutube (linkPath, title) {
        this.video = linkPath;
        this.youtube = true;
        this.title = title;
    }
  },
};
</script>

<style>
/* Styles */
</style>
