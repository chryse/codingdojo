class CreateRelationships < ActiveRecord::Migration
  def change
    create_table :relationships do |t|
      t.integer :user_id
      t.integer :event_id

      t.timestamps null: false
    end

    add_index :relationships, :user_id
    add_index :relationships, :event_id
    add_index :relationships, [:user_id, :event_id], unique: true
    
  end
end
