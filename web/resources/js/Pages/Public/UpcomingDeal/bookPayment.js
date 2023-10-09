import { paypalFrom } from "./Index.vue";

export const bookPayment = () => {
await paypalFrom.get(route("processTransaction"));
};
