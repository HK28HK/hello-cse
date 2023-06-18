<script lang="ts" setup>
import { useForm, Link } from '@inertiajs/vue3';

export interface Props {
    star: { data: Star };
}

const props = defineProps<Props>();

const form = useForm({
    firstname: props.star.data.firstname,
    lastname: props.star.data.lastname,
    description: props.star.data.description,
    image: null,
    _method: 'put',
});
</script>
<template>
    <div class="container">
        <Link href="/admin/stars">Retour</Link>

        <form
            class="form"
            action=""
            @submit.prevent="form.post('/admin/stars/' + star.data.id)"
        >
            <!-- Firstname -->
            <div>
                <label for="firstname">Prénom</label>
                <input
                    type="text"
                    class="form-input"
                    v-model="form.firstname"
                />
                <div class="error-message" v-if="form.errors.firstname">
                    {{ form.errors.firstname }}
                </div>
            </div>

            <!-- Lastname -->
            <div>
                <label for="lastname">Nom</label>
                <input type="text" class="form-input" v-model="form.lastname" />
                <div class="error-message" v-if="form.errors.lastname">
                    {{ form.errors.lastname }}
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description">Description</label>
                <textarea
                    class="form-input"
                    v-model="form.description"
                ></textarea>
                <div class="error-message" v-if="form.errors.description">
                    {{ form.errors.description }}
                </div>
            </div>

            <!-- Image -->
            <div>
                <label for="image">Image</label>
                <input
                    class="form-input"
                    type="file"
                    @input="form.image = $event.target.files[0]"
                />
                <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
            </div>

            <!-- Submit -->
            <button class="btn" type="submit" :disabled="form.processing">
                Mettre à jour
            </button>
        </form>
    </div>
</template>
