<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';

export interface Props {
    star: Star;
}
defineProps<Props>();
</script>

<template>
    <tr class="star-item">
        <td>{{ star.fullname }}</td>
        <td>
            <Link :href="'/admin/stars/' + star.id">Voir</Link>
        </td>
        <td>
            <Link :href="'/admin/stars/' + star.id + '/edit'">Modifier</Link>
        </td>
        <td>
            <Link :href="'/admin/stars/' + star.id" method="delete" as="button">
                Supprimer
            </Link>
        </td>
    </tr>
</template>
