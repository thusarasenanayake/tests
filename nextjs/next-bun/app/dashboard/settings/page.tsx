"use client";

import { fetcher } from "@/libs/api";
import axios from "axios";
import useSWR from "swr";

const getSettings = async () => {
  const response = await axios.get("/api/settings");
  return response.data;
};

export default function SettingsPage() {
  const { data, error, isLoading } = useSWR("/settings", fetcher);

  if (isLoading) return <div>loading...</div>;
  if (error) return <div> {error.message}</div>;

  return <pre>{JSON.stringify(data, null, 1)}</pre>;
}
