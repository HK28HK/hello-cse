<script lang="ts" setup>
import { ref } from 'vue';
import StarContent from '../../components/StarContent.vue';

export interface Props {
    stars: { data: Star[] };
}

const props = defineProps<Props>();

const activeTab = ref<number>(props.stars.data[0]?.id);
</script>

<template>
    <div class="container">
        <div class="tabs">
            <div class="tabs__nav">
                <button
                    class="tab-heading"
                    v-for="star in stars.data"
                    :class="{ active: star.id === activeTab }"
                    @click.prevent="activeTab = star.id"
                >
                    {{ star.fullname }}
                </button>
            </div>
            <div class="tabs__content">
                <template v-for="star in stars.data">
                    <button
                        class="tab-heading"
                        :class="{ active: star.id === activeTab }"
                        @click.prevent="activeTab = star.id"
                    >
                        {{ star.fullname }}
                    </button>
                    <StarContent
                        :star="star"
                        :is-active="star.id === activeTab"
                        @selected="activeTab = $event"
                    />
                </template>
            </div>
        </div>
    </div>
</template>
