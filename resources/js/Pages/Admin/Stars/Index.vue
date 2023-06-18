<script lang="ts" setup>
import StarRow from '../../../components/Admin/StarRow.vue';
import { Link } from '@inertiajs/vue3';

export interface Props {
    stars: { data: Star[] };
}

const props = defineProps<Props>();
</script>
<template>
    <div class="container">
        <table class="table">
            <tbody>
                <StarRow v-for="star in stars.data" :star="star" />
            </tbody>
        </table>

        <Link class="btn" href="/admin/stars/create">+ Ajouter</Link>
    </div>
</template>
