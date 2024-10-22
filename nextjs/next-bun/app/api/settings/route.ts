import { delay } from "@/utils/time";

export async function GET() {
  await delay(2000);
  return Response.json({
    data: {
      userName: "Sam",
      theme: "dark",
    },
  });
}
