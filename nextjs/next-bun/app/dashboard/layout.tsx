"use client"
import Link from "next/link";

export default function DashboardLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <main className="min-h-screen">
      <p>header</p>
      <ul className="flex gap-3 text-blue-600">
        <li>
          <Link href={"/"}>home</Link>
        </li>
        <li>
          <Link href={"/dashboard"}>dashboard</Link>
        </li>
        <li>
          <Link href={"/dashboard/users"}>users</Link>
        </li>
        <li>
          <Link href={"/dashboard/settings"}>settings</Link>
        </li>
      </ul>

      <div className="my-12">
        {children}
      </div>

      <p className="fixed bottom-2">footer</p>
    </main>
  );
}
