<script lang="ts" setup>
import StarContent from '../../../components/StarContent.vue';
import { Link } from '@inertiajs/vue3';

export interface Props {
    star: { data: Star };
}

const props = defineProps<Props>();
</script>
<template>
    <div class="container">
        <Link href="/admin/stars">Retour</Link>

        <StarContent :star="star.data" />

        <Link :href="'/admin/stars/' + star.data.id + '/edit'">Modifier</Link>
    </div>
</template>
