<script lang="ts" setup>
export interface Props {
    star: Star;
    isActive?: boolean;
}
const props = withDefaults(defineProps<Props>(), {
    isActive: false,
});
</script>

<template>
    <div class="star-content" v-if="isActive">
        <div class="star-content__image-wrapper">
            <img :src="star.image" :alt="star.fullname" />
        </div>
        <div>
            <div>
                {{ star.fullname }}
            </div>
            <div>
                {{ star.description }}
            </div>
        </div>
    </div>
</template>
