<template>
    <div class="box">
        <article class="media">
            <div class="media-left">
                <figure class="image is-64">
                    <img :src="imageSource" alt="Profile Image" class="profile-image" />
                </figure>
            </div>
            <div class="media-content">
                <h4 class="message-content-subject">
                    {{ messageTitle }}
                </h4>
                <hr>
                <p class="message-content">
                    {{ messageBody }}
                </p>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: "MessagePreview",
        props: ['imageSource', 'messageTitle', 'messageBody'],
        computed: {

        },
        methods: {

        },
        data() {
            return {

            }
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/variables';

.profile-image {
    border-radius: 64px;
    border: 1px solid $gray-800;
}

.message-content-subject {
    font-weight: 600;
    text-align: left;
}

.message-content {
    text-align: left;
}
</style>
