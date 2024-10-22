"use client";

interface Data {
  name: string;
  id: number;
}

interface Error {
  message: string;
}
import { useEffect, useState } from "react";

export default function UsersPage() {
  console.log("users");

  const [state, setState] = useState<"loading" | "success" | "error">(
    "loading"
  );

  const [data, setData] = useState<Data[] | Error | null>(null);
  useEffect(function () {
    fetch("/api/users")
      .then((data) => {
        console.log(data)
        if (data.ok) {
          data.json().then((json) => {
            setState("success");
            setData(json);
          });
        } else {
          setState("error");
          setData({ message: data.statusText });
        }
      })
      .catch((error) => {
        console.error("error");
      });
  }, []);
  return (
    <>
      {state === "loading" && "loading..."}
      {state === "error" && JSON.stringify(data)}
      {state === "success" && <pre>{JSON.stringify(data,null,1)}</pre>}
    </>
  );
}
