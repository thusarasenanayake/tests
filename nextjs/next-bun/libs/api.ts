import axios from "axios";
import config from "@/config";

const client = axios.create({
  baseURL: config.API_HOST,
  timeout: 8000,
  headers: {
    Accept: "application/json, text/plain, */*",
    "Content-Type": "application/json; charset=utf-8",
  },
});

export const fetcher = (url: string) => {
  return client.get(url).then((res) => {
    if (!res.data) {
      throw Error(res.data.message);
    }

    return res.data;
  });
};

export default client;
