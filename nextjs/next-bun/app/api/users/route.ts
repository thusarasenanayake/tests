import { NextResponse } from "next/server";
import { delay } from "@/utils/time";

export async function GET() {
  const users = [
    { id: 1, name: "Sam" },
    { id: 2, name: "Anna" },
    { id: 3, name: "Jen" },
  ];

  await delay(1000);

  return Response.json({ data: users });
  // return Response.error()
  // return NextResponse.json({}, { status: 501 });
  // return Response.error()
}
