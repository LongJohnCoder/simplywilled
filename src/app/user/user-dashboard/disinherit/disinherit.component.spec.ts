import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DisinheritComponent } from './disinherit.component';

describe('DisinheritComponent', () => {
  let component: DisinheritComponent;
  let fixture: ComponentFixture<DisinheritComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DisinheritComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DisinheritComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
