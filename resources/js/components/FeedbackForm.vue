<template>
    <div class="feedback-container">
        <h2>Feedback Form</h2>

        <form class="feedback-form" @submit="submitForm()">
            <div class="form-group">
                <input type="text" v-model="form.name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <input type="text" v-model="form.phone" placeholder="Phone" required>
            </div>

            <div class="form-group">
                <textarea v-model="form.message" placeholder="Message" required></textarea>
            </div>

            <div class="form-group">
                <label for="storageType">Select storage type</label>

                <select
                    v-model="form.storage_type"
                    id="storageType"
                    class="storageType"
                    required>
                    <option
                        v-for="(type, index) of storageTypes"
                        :key="index"
                        :value="type">
                        {{ capitalizeFirstLetter(type) }}
                    </option>
                </select>
            </div>

            <button
                :disabled="loading"
                class="submit-button">
                Submit
            </button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    import {helperMixin} from '../mixins/helperMixin';

    const storageTypes = [
        'database',
        'file'
    ]

    export default {
        mixins: [helperMixin],
        data: () => ({
            form: {
                name: '',
                phone: '',
                message: '',
                storage_type: storageTypes[0],
            },
            loading: false,
            storageTypes,
        }),
        methods: {
            async submitForm() {
                try {
                    this.loading = true;

                    await axios.post('/feedback', this.form);

                    alert('Feedback submitted successfully!');

                    this.form = {name: '', phone: '', message: '', storage_type: ''};
                } catch (error) {
                    alert('Failed to submit feedback.');
                } finally {
                    this.loading = false;
                }
            },
        },
    };
</script>

<style scoped>
    .feedback-container {
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
    }

    .feedback-form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 5px;
    }

    .form-group textarea {
        height: 150px;
    }

    .submit-button {
        width: 100%;
        background-color: #0056b3;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-button:hover {
        background-color: #004494;
    }

    .storageType {
        margin-left: 10px;
    }
</style>
