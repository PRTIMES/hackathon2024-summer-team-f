"use client";
import { useState } from "react";
import { Button } from "@nextui-org/react";
import { Select, SelectItem } from "@nextui-org/react";
import { Input } from "@nextui-org/input";
import { Textarea } from "@nextui-org/input";

const CATEGORY = [{ name: "パソコン" }, { name: "ネットサービス" }];

const PURPOSE = [{ name: "マーケティング" }, { name: "イベント" }];

export default function New() {
  const [title, setTitle] = useState("");
  const [subtitle, setSubtitle] = useState("");
  const [content, setContent] = useState("");
  const [category, setCategory] = useState("");
  const [purpose, setPurpose] = useState("");

  const titleLength = title.length;
  const subtitleLength = subtitle.length;
  const contentLength = content.length;

  return (
    <form className="new-form flex min-h-screen flex-col items-center justify-between p-24">
      <div>
        <Input
          type="text"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
          placeholder="リリースタイトルを入力"
          size="lg"
        />
        <span>{titleLength}/100</span>
      </div>
      <div>
        <Input
          value={subtitle}
          type="text"
          onChange={(e) => setSubtitle(e.target.value)}
          placeholder="サブタイトルを入力"
          size="md"
        />
        <span>{subtitleLength}/100</span>
      </div>
      <div className="w-full flex flex-col gap-4">
        <Textarea
          value={content}
          type="text"
          onChange={(e) => setContent(e.target.value)}
          placeholder="本文を入力"
        />
        <span>{contentLength}/8000</span>
      </div>
      <Select
        label="種類を選択"
        className="max-w-xs"
        value={category}
        onChange={(e) => setCategory(e.target.value)}
      >
        {CATEGORY.map((cat) => (
          <SelectItem key={cat.name}>{cat.name}</SelectItem>
        ))}
      </Select>
      <Select
        label="目的を選択"
        className="max-w-xs"
        value={purpose}
        onChange={(e) => setPurpose(e.target.value)}
      >
        {PURPOSE.map((pur) => (
          <SelectItem key={pur.name}>{pur.name}</SelectItem>
        ))}
      </Select>
      <Button className="btn btn-large" color="primary">
        作成
      </Button>
    </form>
  );
}
