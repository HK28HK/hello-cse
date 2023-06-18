<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm<StarForm>({
    firstname: '',
    lastname: '',
    description: '',
    image: '',
});
</script>
<template>
    <div class="container">
        <Link href="/admin/stars">Retour</Link>

        <form
            class="form"
            action=""
            @submit.prevent="form.post('/admin/stars')"
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
                Créer
            </button>
        </form>
    </div>
</template>
