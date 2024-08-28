"use client";
import { useState } from "react";
import { mediaData } from "../state/mediaData";
import { CreateDeliveryNotify } from "./CreateDeliveryNotify";
export const MediaDisplay = () => {
  const [mediaDatas, setMediaData] = useState(mediaData);
  const startDelivery = () => {
    CreateDeliveryNotify("配信が開始されました");
  };
  const deleteMediaData = (deleteIndex: number) => {
    setMediaData(mediaDatas.filter((_, index) => index !== deleteIndex));
  };
  return (
    <>
      <p className="font-bold flex justify-center mb-3">おすすめのメディアリストはこちらです。</p>
      <table className="min-w-full bg-white border border-gray-200">
        <thead className="border-b">
          <tr>
            <th className="py-2 px-4 border-b">メディア種類</th>
            <th className="py-2 px-4 border-b">メディア名</th>
            <th className="py-2 px-4 border-b">メディア概要</th>
            <th className="py-2 px-4 border-b">会社名</th>
            <th className="py-2 px-4 border-b">部署</th>
            <th className="py-2 px-4 border-b">配信手段</th>
          </tr>
        </thead>
        <tbody>
          {mediaDatas.map((media, index) => (
            <tr key={index} className="text-center">
              <td className="py-2 px-4 border-b">{media.media_kind}</td>
              <td className="py-2 px-4 border-b">{media.name}</td>
              <td className="py-2 px-4 border-b">{media.explanation}</td>
              <td className="py-2 px-4 border-b">{media.company}</td>
              <td className="py-2 px-4 border-b">{media.department}</td>
              <td className="py-2 px-4 border-b">{media.means}</td>
              <td className="py-2 px-4 border-b">
                <button className="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700" onClick={() => deleteMediaData(index)}>
                  削除
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
      <div className="flex items-center justify-end mr-12 mt-3">
        <button className="px-5 py-2.5 bg-blue-500 text-white rounded-3xl text-center mb-5 no-underline hover:bg-blue-700" onClick={startDelivery}>
          配信
        </button>
      </div>
    </>
  );
};
