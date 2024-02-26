export const helperMixin = {
    methods: {
        capitalizeFirstLetter: s => s ? `${s[0].toUpperCase()}${s.slice(1)}` : '',
    },
};
