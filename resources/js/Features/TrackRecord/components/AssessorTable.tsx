import { TrackRecordItem } from "../types";

export default function AssessorTable({ items }: { items: TrackRecordItem[] }) {
  if (items.length === 0) return null;

  return (
    <div className="bg-slate-800/40 rounded-xl shadow-sm border border-slate-700 overflow-hidden">
      <div className="bg-slate-800/80 px-6 py-4 border-b border-slate-700">
        <h2 className="text-xl font-bold text-white">2. Asesor</h2>
      </div>
      <div className="overflow-x-auto">
        <table className="w-full text-left text-sm text-slate-200">
          <thead className="bg-slate-800/50 text-xs uppercase text-slate-400 font-semibold border-b border-slate-700">
            <tr>
              <th className="px-6 py-4 w-16 text-center">No</th>
              <th className="px-6 py-4">Bidang Kepakaran</th>
              <th className="px-6 py-4">Institusi Penyelenggara</th>
            </tr>
          </thead>
          <tbody className="divide-y divide-slate-700/50">
            {items.map((item, index) => (
              <tr key={item.id} className="hover:bg-slate-700/30 transition-colors">
                <td className="px-6 py-4 text-center">{index + 1}</td>
                <td className="px-6 py-4 font-medium text-white">{item.title}</td>
                <td className="px-6 py-4 text-slate-300">{item.institution}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}